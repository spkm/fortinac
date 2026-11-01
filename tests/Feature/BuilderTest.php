<?php

use Carbon\CarbonImmutable;
use spkm\FortiNac\Exceptions\FailedException;
use spkm\FortiNac\Exceptions\NotFoundException;
use spkm\FortiNac\Exceptions\UnauthorizedException;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\FortiNacPaginator;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Tests\Fixtures\ExampleByMacRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleCountRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleCreateRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleData;
use spkm\FortiNac\Tests\Fixtures\ExampleDeleteManyRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleDeleteRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleEnableRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleItemRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleListRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleReadOnlyResource;
use spkm\FortiNac\Tests\Fixtures\ExampleResource;
use spkm\FortiNac\Tests\Fixtures\ExampleSettingRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleSettingResource;
use spkm\FortiNac\Tests\Fixtures\ExampleSettingUpdateRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleUpdateRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

function example(): ExampleResource
{
    return new ExampleResource(FakeFortiNac::connector());
}

it('turns conditions into FortiNAC\'s filter', function () {
    $builder = example()
        ->where('role', 'Staff')
        ->where('creationTime', '<', CarbonImmutable::parse('2026-01-01T00:00:00+00:00'))
        ->whereNot('status', 'Offline')
        ->whereIn('id', [1, 2])
        ->whereBetween('ports', [1, 3])
        ->whereContains('hostName', 'lab')
        ->whereNotContains('notes', 'old')
        ->where('ip', '10.0.0.1')
        ->orderByDesc('id')
        ->offset(10)
        ->limit(5);

    expect($builder->toFilter()->toString())->toBe('role==Staff&creationTime<1767225600000&status!=Offline&id==1,id==2&ports>=1&ports<=3&hostName=@*lab*&notes!@*old*&ip==10\.0\.0\.1')
        ->and($builder->toArray())->toMatchArray(['sortKey' => 'id', 'sortDir' => 'DESC', 'start' => 10, 'count' => 5])
        ->and($builder->toArray()['filter'])->toBe(['role==Staff', 'creationTime<1767225600000', 'status!=Offline', 'id==1,id==2', 'ports>=1', 'ports<=3', 'hostName=@*lab*', 'notes!@*old*', 'ip==10\.0\.0\.1'])
        ->and(example()->where('a', 1)->toArray())->toBe(['filter' => 'a==1'])
        ->and($builder->toRequest())->toBeInstanceOf(ExampleListRequest::class)
        ->and($builder->toQuery()->getCount())->toBe(5)
        ->and(example()->forPage(3, 20)->toArray())->toBe(['start' => 40, 'count' => 20])
        ->and(fn () => example()->whereIn('id', []))->toThrow(InvalidArgumentException::class, 'at least one value');
});

it('groups alternatives with closures', function () {
    $either = example()->where('a', 1)->orWhere('b', 2)->toFilter()->toString();
    $group = example()->where('a', 1)->orWhere(fn (Builder $query) => $query->where('b', 2)->where('c', '>', 3))->toFilter()->toString();
    $withOperator = example()->where('a', 1)->orWhere('b', '!=', 2)->toFilter()->toString();

    expect($either)->toBe('a==1,b==2')
        ->and($group)->toBe('a==1,b==2,c>3')
        ->and($withOperator)->toBe('a==1,b!=2')
        ->and(example()->where('a', 1)->orWhere('b', 2)->where('c', 3)->toArray()['filter'])->toBe(['a==1,b==2', 'c==3']);
});

it('gets the matching models', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([['id' => 1, 'name' => 'a'], ['id' => 2, 'name' => 'b']], 2)]);

    $records = example()->where('name', 'a')->orderBy('name')->get();

    expect($records)->toHaveCount(2)
        ->and($records->first())->toBeInstanceOf(ExampleData::class)
        ->and($records->first()->name)->toBe('a')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleListRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example?filter=name%3D%3Da&sortKey=name&sortDir=ASC');
});

it('fetches the first record and counts the rest', function () {
    $mockClient = FakeFortiNac::respondWith([
        ExampleListRequest::class => FakeFortiNac::list([['id' => 7]], 42),
        ExampleCountRequest::class => FakeFortiNac::envelope([42]),
    ]);

    $first = example()->where('a', 1)->orderBy('a')->first();
    $count = example()->where('a', 1)->orderBy('a')->limit(3)->count();
    $exists = example()->exists();

    expect($first->id)->toBe(7)
        ->and($count)->toBe(42)
        ->and($exists)->toBeTrue()
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleListRequest::class))->toBe([['filter' => 'a==1', 'sortKey' => 'a', 'sortDir' => 'ASC', 'count' => 1]])
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleCountRequest::class))->toBe([['filter' => 'a==1'], []]);

    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);
    expect(example()->first())->toBeNull();
});

it('counts the whole filtered list when the collection has no count endpoint, and from the total when nothing is filtered', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([['id' => 7], ['id' => 8]], 42)]);
    $resource = new ExampleReadOnlyResource(FakeFortiNac::connector());

    expect($resource->where('a', 1)->limit(1)->count())->toBe(2)
        ->and((new ExampleReadOnlyResource(FakeFortiNac::connector()))->count())->toBe(42)
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleListRequest::class))->toBe([['filter' => 'a==1'], ['count' => 1]]);

    FakeFortiNac::respondWith([ExampleCountRequest::class => FakeFortiNac::envelope([], 5)]);
    expect(example()->count())->toBe(5);

    FakeFortiNac::respondWith([ExampleCountRequest::class => FakeFortiNac::failure('Not permitted')]);
    expect(fn () => example()->count())->toThrow(FailedException::class, 'Not permitted');
});

it('finds a record by id, by MAC address, or not at all', function () {
    $mockClient = FakeFortiNac::respondWith([
        ExampleItemRequest::class => FakeFortiNac::record(['id' => 5, 'name' => 'five']),
        ExampleByMacRequest::class => FakeFortiNac::record(['id' => 6, 'name' => 'six']),
    ]);

    expect(example()->find(5)->name)->toBe('five')
        ->and(example()->findOrFail(5)->id)->toBe(5)
        ->and(example()->findByMac('00:11:22:33:44:55')->id)->toBe(6)
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleItemRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/5')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleByMacRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/by-mac/00%3A11%3A22%3A33%3A44%3A55');

    FakeFortiNac::respondWith([
        ExampleItemRequest::class => FakeFortiNac::failure('Not Found', 404),
        ExampleByMacRequest::class => FakeFortiNac::failure('Not Found', 404),
    ]);
    expect(example()->find(9))->toBeNull()
        ->and(example()->findByMac('none'))->toBeNull()
        ->and(fn () => example()->findOrFail(9))->toThrow(NotFoundException::class, 'FortiNAC responded 404 to GET /api/v2/example/9: Not Found');

    FakeFortiNac::respondWith([ExampleItemRequest::class => FakeFortiNac::envelope([])]);
    expect(example()->find(9))->toBeNull()
        ->and(fn () => example()->findOrFail(9))->toThrow(NotFoundException::class, 'FortiNAC responded 200 to GET /api/v2/example/9');
});

it('finds by filtering when FortiNAC has no item endpoint', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([['id' => 3]])]);
    $resource = new ExampleReadOnlyResource(FakeFortiNac::connector());

    expect($resource->where('x', 1)->find(3)->id)->toBe(3)
        ->and($resource->findOrFail(3)->id)->toBe(3)
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleListRequest::class)[0])->toBe(['filter' => 'id==3', 'count' => 1]);

    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);
    expect($resource->find(4))->toBeNull()
        ->and(fn () => $resource->findOrFail(4))->toThrow(NotFoundException::class);
});

it('pages through every record lazily, mapping errors on the way', function () {
    config()->set('fortinac.pagination.per_page', 2);
    $pages = [
        FakeFortiNac::list([['id' => 1], ['id' => 2]], 5),
        FakeFortiNac::list([['id' => 3], ['id' => 4]], 5),
        FakeFortiNac::list([['id' => 5]], 5),
    ];
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $all = example()->where('a', 1)->limit(999)->all();

    expect($all->map->id->all())->toBe([1, 2, 3, 4, 5])
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['filter' => 'a==1', 'count' => 2, 'start' => 0],
            ['filter' => 'a==1', 'count' => 2, 'start' => 2],
            ['filter' => 'a==1', 'count' => 2, 'start' => 4],
        ])
        ->and(example()->paginate())->toBeInstanceOf(FortiNacPaginator::class);

    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::failure('Forbidden', 403)]);
    expect(fn () => example()->lazy()->all())->toThrow(UnauthorizedException::class)
        ->and(fn () => example()->cursor(3)->first())->toThrow(UnauthorizedException::class);

    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::failure('Unexpected')]);
    expect(fn () => example()->lazy()->all())->toThrow(FailedException::class, 'Unexpected');
});

it('creates, updates, deletes and acts on records', function () {
    $mockClient = FakeFortiNac::respondWith([
        ExampleCreateRequest::class => FakeFortiNac::record(['id' => 1, 'name' => 'new']),
        ExampleUpdateRequest::class => FakeFortiNac::record(['id' => 1, 'name' => 'changed']),
        ExampleDeleteRequest::class => FakeFortiNac::envelope(),
        ExampleDeleteManyRequest::class => FakeFortiNac::envelope(),
        ExampleEnableRequest::class => FakeFortiNac::record(['id' => 1, 'enabled' => true]),
    ]);

    $created = example()->create(['name' => 'new']);
    $updated = example()->update(1, ExampleData::from(['name' => 'changed']), ['force' => 'true']);
    $deleted = example()->delete(1, ['force' => 'true']);
    $deletedMany = example()->deleteMany([1, 2]);
    $enabled = example()->enable(1);

    expect($created)->toBeInstanceOf(ExampleData::class)
        ->and($created->name)->toBe('new')
        ->and($updated->name)->toBe('changed')
        ->and($deleted)->toBeTrue()
        ->and($deletedMany)->toBeTrue()
        ->and($enabled->enabled)->toBeTrue()
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['name' => 'new'])
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(['name' => 'changed'])
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleDeleteManyRequest::class)[0])->toBe([1, 2])
        ->and(FakeFortiNac::received($mockClient, ExampleUpdateRequest::class)->getMethod()->value)->toBe('POST')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/1?force=true')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleDeleteRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/1?force=true');

    FakeFortiNac::respondWith([ExampleUpdateRequest::class => FakeFortiNac::envelope()]);
    expect(example()->update(1, ['name' => 'same']))->toBeNull();
});

it('throws for a failure on a write', function () {
    FakeFortiNac::respondWith([ExampleCreateRequest::class => FakeFortiNac::failure('A host with that MAC address exists')]);

    expect(fn () => example()->create(['name' => '']))->toThrow(FailedException::class, 'FortiNAC responded 200 to POST /api/v2/example: A host with that MAC address exists');
});

it('refuses an action FortiNAC does not document for the collection', function () {
    $resource = new ExampleReadOnlyResource(FakeFortiNac::connector());

    expect(fn () => $resource->create(['a' => 1]))->toThrow(LogicException::class, "FortiNAC's API documents no way to create these records.")
        ->and(fn () => $resource->update(1, []))->toThrow(LogicException::class, 'no way to update')
        ->and(fn () => $resource->delete(1))->toThrow(LogicException::class, 'no way to delete');
});

it('reads and changes a setting FortiNAC keeps one of', function () {
    $mockClient = FakeFortiNac::respondWith([
        ExampleSettingRequest::class => FakeFortiNac::record(['id' => 1, 'name' => 'setting']),
        ExampleSettingUpdateRequest::class => FakeFortiNac::record(['id' => 1, 'name' => 'changed']),
    ]);
    $setting = new ExampleSettingResource(FakeFortiNac::connector());

    expect($setting->get()->name)->toBe('setting')
        ->and($setting->update(['name' => 'changed'])->name)->toBe('changed')
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleSettingUpdateRequest::class)[0])->toBe(['name' => 'changed'])
        ->and(fn () => $setting->delete())->toThrow(LogicException::class, "FortiNAC's API documents no way to delete this setting.")
        ->and($setting->connector())->toBeInstanceOf(FortiNacConnector::class);
});

it('escapes the wildcard in text given to whereContains', function () {
    expect(example()->whereContains('hostName', 'a*b')->toArray())->toBe(['filter' => 'hostName=@*a\\*b*'])
        ->and(example()->whereNotContains('hostName', '*')->toArray())->toBe(['filter' => 'hostName!@*\\**']);
});

it('refuses an id that is not a whole number, and a path segment that would change the endpoint', function () {
    $resource = new ExampleReadOnlyResource(FakeFortiNac::connector());
    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);

    expect(fn () => $resource->find('nobody,id>0'))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC record id')
        ->and(fn () => $resource->findOrFail('12abc'))->toThrow(InvalidArgumentException::class, 'is not a FortiNAC record id')
        ->and($resource->find('7'))->toBeNull()
        ->and(fn () => FakeFortiNac::connector()->from('/user')->find('..'))->toThrow(InvalidArgumentException::class, 'cannot be used in a request path')
        ->and(fn () => FakeFortiNac::connector()->from('/user')->find(''))->toThrow(InvalidArgumentException::class)
        ->and(fn () => FakeFortiNac::connector()->from('/user')->update('.', []))->toThrow(InvalidArgumentException::class)
        ->and(fn () => FakeFortiNac::connector()->from('/user/../admin')->get())->toThrow(InvalidArgumentException::class, 'is not a path FortiNAC serves')
        ->and(fn () => FakeFortiNac::connector()->get('../../admin'))->toThrow(InvalidArgumentException::class, 'is not a path FortiNAC serves');
});
