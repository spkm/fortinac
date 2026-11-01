<?php

use Saloon\Http\Faking\MockResponse;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\Requests\AdhocListRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleData;
use spkm\FortiNac\Tests\Fixtures\ExampleListRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

it('asks for each page by start and count and stops at a short page', function () {
    $pages = [
        FakeFortiNac::list([['id' => 1], ['id' => 2]]),
        FakeFortiNac::list([['id' => 3], ['id' => 4]]),
        FakeFortiNac::list([['id' => 5]]),
    ];
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $paginator = FakeFortiNac::connector()->paginate(new ExampleListRequest(['sortKey' => 'id']), 2);
    $items = $paginator->dtos()->all();

    expect($items)->toHaveCount(5)
        ->and($items[0])->toBeInstanceOf(ExampleData::class)
        ->and(collect($items)->map->id->all())->toBe([1, 2, 3, 4, 5])
        ->and(FakeFortiNac::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['sortKey' => 'id', 'count' => 2, 'start' => 0],
            ['sortKey' => 'id', 'count' => 2, 'start' => 2],
            ['sortKey' => 'id', 'count' => 2, 'start' => 4],
        ]);
});

it('stops once the records fetched reach the total, and at an empty page', function () {
    $pages = [FakeFortiNac::list([['id' => 1], ['id' => 2]], 4), FakeFortiNac::list([['id' => 3], ['id' => 4]], 4), FakeFortiNac::list([['id' => 5]], 4)];
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    expect(FakeFortiNac::connector()->paginate(new ExampleListRequest, 2)->collect()->count())->toBe(4)
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleListRequest::class))->toHaveCount(2);

    $pages = [FakeFortiNac::list([['id' => 1]], 9), FakeFortiNac::list([], 9)];
    FakeFortiNac::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeFortiNac::connector()->paginate(new ExampleListRequest, 1)->collect()->count())->toBe(1);

    $pages = [FakeFortiNac::list([['id' => 1]], 9, 2), FakeFortiNac::list([['id' => 2]], 9, 2)];
    FakeFortiNac::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeFortiNac::connector()->paginate(new ExampleListRequest, 1)->collect()->count())->toBe(2);
});

it('takes the page size from config and gives items as arrays for a request without a model', function () {
    config()->set('fortinac.pagination.per_page', 3);
    $mockClient = FakeFortiNac::respondWith([AdhocListRequest::class => FakeFortiNac::list([['id' => 1]])]);

    $paginator = FakeFortiNac::connector()->paginate(new AdhocListRequest('/thing'));

    expect($paginator->collect()->all())->toBe([['id' => 1]])
        ->and(FakeFortiNac::queriesReceived($mockClient, AdhocListRequest::class)[0])->toBe(['count' => 3, 'start' => 0])
        ->and(fn () => $paginator->dtos())->toThrow(LogicException::class, 'AdhocListRequest has no model; use collect()');
});

it('knows how many pages there are from the total', function () {
    FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([['id' => 1]], 7)]);
    $paginator = FakeFortiNac::connector()->paginate(new ExampleListRequest, 3);
    $paginator->current();

    expect((new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toBe(3);

    FakeFortiNac::respondWith([ExampleListRequest::class => MockResponse::make([['id' => 1]])]);
    $paginator = FakeFortiNac::connector()->paginate(new ExampleListRequest, 3);
    expect(fn () => (new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toThrow(UnexpectedValueException::class, 'has no total');
});

it('treats a page that is not JSON as a server error', function () {
    FakeFortiNac::respondWith([ExampleListRequest::class => MockResponse::make('<html></html>', 200, ['Content-Type' => 'text/html'])]);

    expect(fn () => FakeFortiNac::connector()->paginate(new ExampleListRequest)->collect()->all())->toThrow(ServerErrorException::class);
});
