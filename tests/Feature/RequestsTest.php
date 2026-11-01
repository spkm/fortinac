<?php

use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\FortiNac\Exceptions\FailedException;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\Requests\AdhocRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Support\Payload;
use spkm\FortiNac\Tests\Fixtures\ExampleCountRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleCreateRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleData;
use spkm\FortiNac\Tests\Fixtures\ExampleDeleteManyRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleDeleteRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleEnableRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleItemRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleListRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleUpdateRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

it('reads the envelope, a bare list and a bare object', function () {
    $envelope = FakeFortiNac::send(new ExampleListRequest, ['status' => 'success', 'errorMessage' => null, 'results' => [['id' => 1], ['id' => 2], 'junk'], 'total' => 9, 'filtered' => 2]);
    $bare = FakeFortiNac::send(new ExampleListRequest, [['id' => 3]]);
    $object = FakeFortiNac::send(new ExampleListRequest, ['id' => 4]);
    $one = FakeFortiNac::send(new ExampleListRequest, ['status' => 'success', 'results' => ['id' => 5]]);

    expect($envelope->dto())->toBeInstanceOf(Collection::class)
        ->and($envelope->dto()->map->id->all())->toBe([1, 2])
        ->and(Payload::count($envelope))->toBe(2)
        ->and(Payload::total($envelope))->toBe(2)
        ->and(Payload::status($envelope))->toBe('success')
        ->and($bare->dto()->map->id->all())->toBe([3])
        ->and(Payload::status($bare))->toBeNull()
        ->and($object->dto()->map->id->all())->toBe([4])
        ->and($one->dto()->map->id->all())->toBe([5])
        ->and(FakeFortiNac::send(new ExampleListRequest, ['status' => 'success', 'errorMessage' => null, 'ownedHosts' => [['id' => 6]], 'loggedOnHosts' => []])->dto()->first()->extra)->toBe(['ownedHosts' => [['id' => 6]], 'loggedOnHosts' => []])
        ->and(FakeFortiNac::send(new ExampleItemRequest(1), ['status' => 'success', 'errorMessage' => null, 'timeout' => 0])->dto()->extra)->toBe(['timeout' => 0])
        ->and(FakeFortiNac::send(new ExampleItemRequest(1), ['status' => 'success', 'errorMessage' => null, 'total' => 4])->dto())->toBeNull()
        ->and(FakeFortiNac::send(new ExampleListRequest, [])->dto())->toHaveCount(0)
        ->and(FakeFortiNac::send(new ExampleListRequest, ['status' => 'success', 'results' => null])->dto())->toHaveCount(0)
        ->and(FakeFortiNac::send(new ExampleListRequest, '')->dto())->toBeNull()
        ->and(Payload::total($bare))->toBeNull()
        ->and(fn () => Payload::count($bare))->toThrow(UnexpectedValueException::class, 'has no total')
        ->and(fn () => Payload::records(FakeFortiNac::send(new ExampleListRequest, '"text"')))->toThrow(UnexpectedValueException::class, 'is not a record or a list of records');
});

it('maps one record, a count, raw JSON, and nothing for an empty answer', function () {
    expect(FakeFortiNac::send(new ExampleItemRequest(1), ['status' => 'success', 'results' => [['id' => 1, 'name' => 'a']]])->dto())->toBeInstanceOf(ExampleData::class)
        ->and(FakeFortiNac::send(new ExampleItemRequest(1), ['id' => 9])->dto()->id)->toBe(9)
        ->and(FakeFortiNac::send(new ExampleItemRequest(1), ['status' => 'success', 'results' => []])->dto())->toBeNull()
        ->and(FakeFortiNac::send(new ExampleCountRequest, ['status' => 'success', 'results' => [42]])->dto())->toBe(42)
        ->and(FakeFortiNac::send(new ExampleCountRequest, ['status' => 'success', 'results' => 43])->dto())->toBe(43)
        ->and(FakeFortiNac::send(new ExampleCountRequest, ['status' => 'success', 'results' => [], 'total' => 44])->dto())->toBe(44)
        ->and(FakeFortiNac::send(new ExampleCountRequest, ['status' => 'success', 'results' => [['id' => 1]]])->dto())->toBeNull()
        ->and(FakeFortiNac::send(new ExampleCountRequest, '45')->dto())->toBe(45)
        ->and(FakeFortiNac::send(new AdhocRequest(Method::GET, '/x'), ['status' => 'success', 'results' => [['id' => 1]]])->dto())->toBe(['status' => 'success', 'results' => [['id' => 1]]])
        ->and(FakeFortiNac::send(new ExampleUpdateRequest(1, ['name' => 'b']), '', 204)->dto())->toBeNull()
        ->and(FakeFortiNac::send(new ExampleDeleteRequest(1), '', 204)->dto())->toBeNull()
        ->and(FakeFortiNac::send(new ExampleDeleteRequest(1), ['status' => 'success', 'results' => []])->dto())->toBeNull();
});

it('treats a success whose status is not success as a failure', function () {
    expect(fn () => FakeFortiNac::send(new ExampleItemRequest(1), ['status' => 'failure', 'errorMessage' => 'No such host', 'results' => []])->dto())
        ->toThrow(FailedException::class, 'FortiNAC responded 200 to GET /api/v2/example/1: No such host')
        ->and(fn () => FakeFortiNac::send(new ExampleListRequest, ['status' => 'error', 'results' => []])->dto())
        ->toThrow(FailedException::class, 'FortiNAC responded 200 to GET /api/v2/example: status error');
});

it('treats a success that is not JSON as a server error', function () {
    expect(fn () => FakeFortiNac::send(new ExampleItemRequest(1), '<html><title>Maintenance</title></html>', 200, ['Content-Type' => 'text/html'])->dto())
        ->toThrow(ServerErrorException::class, "FortiNAC responded 200 to GET /api/v2/example/1 with an HTML page instead of JSON ('Maintenance')")
        ->and(fn () => FakeFortiNac::send(new ExampleListRequest, 'not json')->dto())
        ->toThrow(ServerErrorException::class, 'with a body that is not JSON');
});

it('sends a record as JSON, from an array, a model or a list, with the documented query options', function () {
    $mockClient = FakeFortiNac::respondWith([
        ExampleCreateRequest::class => FakeFortiNac::record(['id' => 1]),
        ExampleUpdateRequest::class => FakeFortiNac::record(['id' => 1]),
        ExampleDeleteManyRequest::class => FakeFortiNac::envelope(),
        ExampleEnableRequest::class => FakeFortiNac::record(['id' => 1]),
        ExampleDeleteRequest::class => FakeFortiNac::envelope(),
    ]);
    $connector = FakeFortiNac::connector();

    $connector->send(new ExampleCreateRequest(['name' => 'a', 'enabled' => true]));
    $connector->send(new ExampleUpdateRequest(1, ExampleData::from(['name' => 'g', 'creationTime' => 100, 'custom' => 'x']), ['force' => 'true']));
    $connector->send(new ExampleDeleteManyRequest([1, 2]));
    $connector->send(new ExampleEnableRequest(1, ['async' => 'false']));
    $connector->send(new ExampleDeleteRequest(1, ['force' => 'true']));

    expect(FakeFortiNac::bodiesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['name' => 'a', 'enabled' => true])
        ->and(FakeFortiNac::received($mockClient, ExampleCreateRequest::class)->headers()->get('Content-Type'))->toBe('application/json')
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(['name' => 'g', 'creationTime' => 100000, 'custom' => 'x'])
        ->and(FakeFortiNac::bodiesReceived($mockClient, ExampleDeleteManyRequest::class)[0])->toBe([1, 2])
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleUpdateRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/1?force=true')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleEnableRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/1/enable?async=false')
        ->and((string) FakeFortiNac::received($mockClient, ExampleEnableRequest::class)->body())->toBe('')
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleDeleteRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/example/1?force=true');
});

it('knows which requests are safe to retry and what they return', function () {
    expect((new ExampleListRequest)->isSafe())->toBeTrue()
        ->and((new ExampleItemRequest(1))->isSafe())->toBeTrue()
        ->and((new ExampleCountRequest)->isSafe())->toBeTrue()
        ->and((new ExampleCreateRequest([]))->isSafe())->toBeFalse()
        ->and((new ExampleEnableRequest(1))->isSafe())->toBeFalse()
        ->and((new ExampleDeleteRequest(1))->isSafe())->toBeFalse()
        ->and((new ExampleListRequest)->dtoClass())->toBe(ExampleData::class)
        ->and((new ExampleListRequest)->responseShape())->toBe(FortiNacRequest::LIST)
        ->and((new ExampleCountRequest)->responseShape())->toBe(FortiNacRequest::SCALAR)
        ->and((new ExampleDeleteRequest(1))->responseShape())->toBe(FortiNacRequest::NONE)
        ->and((new AdhocRequest(Method::GET, '/x'))->isSafe())->toBeTrue()
        ->and((new AdhocRequest(Method::POST, '/x'))->isSafe())->toBeFalse();
});

it('caches a GET only when caching is on', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleItemRequest::class => FakeFortiNac::record(['id' => 1])]);
    $connector = FakeFortiNac::connector();

    $connector->send(new ExampleItemRequest(1));
    $connector->send(new ExampleItemRequest(1));
    expect(FakeFortiNac::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(2);

    config()->set('fortinac.cache.enabled', true);
    $mockClient = FakeFortiNac::respondWith([ExampleItemRequest::class => FakeFortiNac::record(['id' => 2]), ExampleCreateRequest::class => FakeFortiNac::record(['id' => 3])]);
    $connector->send(new ExampleItemRequest(2));
    $cached = $connector->send(new ExampleItemRequest(2));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));

    expect(FakeFortiNac::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(1)
        ->and($cached->isCached())->toBeTrue()
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleCreateRequest::class))->toHaveCount(2);
});

it('keeps a count request to the filter alone', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleCountRequest::class => FakeFortiNac::envelope([1])]);

    FakeFortiNac::connector()->send(new ExampleCountRequest(['filter' => 'a==1', 'sortKey' => 'a', 'sortDir' => 'ASC', 'start' => 2, 'count' => 5]));

    expect(FakeFortiNac::queriesReceived($mockClient, ExampleCountRequest::class)[0])->toBe(['filter' => 'a==1'])
        ->and(MockResponse::make([])->status())->toBe(200);
});
