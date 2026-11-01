<?php

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\Faking\MockResponse;
use spkm\FortiNac\FortiNacPaginator;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Requests\AdhocBodyRequest;
use spkm\FortiNac\Requests\AdhocCountRequest;
use spkm\FortiNac\Requests\AdhocListRequest;
use spkm\FortiNac\Requests\AdhocRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleCreateRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleItemRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleListRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

it('talks to the API under the server address with its token', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);
    $connector = FakeFortiNac::connector(baseUrl: 'https://nac.school.test:8443/', token: 'secret-token');

    $connector->send(new ExampleListRequest);

    expect($connector->resolveBaseUrl())->toBe('https://nac.school.test:8443/api/v2')
        ->and($connector->baseUrl())->toBe('https://nac.school.test:8443/')
        ->and($connector->headers()->get('Accept'))->toBe('application/json')
        ->and(FakeFortiNac::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer secret-token')
        ->and(FakeFortiNac::received($mockClient, ExampleListRequest::class)->getUrl())->toBe('https://nac.school.test:8443/api/v2/example');
});

it('verifies the server certificate unless told not to, or told which CA bundle to use', function () {
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);

    FakeFortiNac::connector()->send(new ExampleListRequest);
    FakeFortiNac::connector(verify: false)->send(new ExampleListRequest);
    FakeFortiNac::connector(verify: '/etc/ssl/nac.pem')->send(new ExampleListRequest);

    $configs = collect($mockClient->getRecordedResponses())->map(fn ($response) => $response->getPendingRequest()->config()->get('verify'))->all();

    expect($configs)->toBe([true, false, '/etc/ssl/nac.pem'])
        ->and(FakeFortiNac::connector(verify: false)->verifies())->toBeFalse();
});

it('repeats a parameter with several values, as FortiNAC reads it', function () {
    $mockClient = FakeFortiNac::respondWith([AdhocRequest::class => FakeFortiNac::envelope(), AdhocBodyRequest::class => FakeFortiNac::envelope()]);

    FakeFortiNac::connector()->post('/host/delete', [], ['id' => [1, 2], 'force' => true, 'reason' => 'a b', 'skip' => null]);
    FakeFortiNac::connector()->get('/host?start=0', ['count' => 5]);

    expect(FakeFortiNac::urisReceived($mockClient, AdhocRequest::class))->toBe([
        FakeFortiNac::API_URL.'/host/delete?id=1&id=2&force=true&reason=a%20b',
        FakeFortiNac::API_URL.'/host?start=0&count=5',
    ]);
});

it('takes its timeouts and retries from config', function () {
    config()->set('fortinac.timeouts', ['connect' => 3, 'request' => 7]);
    config()->set('fortinac.retries', ['times' => 3, 'interval_ms' => 1]);
    $connector = FakeFortiNac::connector();

    expect($connector->getConnectTimeout())->toBe(3.0)
        ->and($connector->getRequestTimeout())->toBe(7.0)
        ->and($connector->tries)->toBe(3);
});

it('retries a GET, not a write, on a connection failure or a server error', function () {
    config()->set('fortinac.retries', ['times' => 3, 'interval_ms' => 1]);
    $mockClient = FakeFortiNac::respondWith([
        ExampleItemRequest::class => MockResponse::make([], 503),
        ExampleCreateRequest::class => MockResponse::make([], 503),
    ]);
    $connector = FakeFortiNac::connector();

    $connector->send(new ExampleItemRequest(1));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));

    expect(FakeFortiNac::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(3)
        ->and(FakeFortiNac::urisReceived($mockClient, ExampleCreateRequest::class))->toHaveCount(1);

    $fatal = new FatalRequestException(new RuntimeException('down'), $connector->createPendingRequest(new ExampleItemRequest(1)));
    expect($connector->handleRetry($fatal, new ExampleItemRequest(1)))->toBeTrue()
        ->and($connector->handleRetry($fatal, new ExampleCreateRequest([])))->toBeFalse();
});

it('makes ad-hoc calls by method and path', function () {
    $mockClient = FakeFortiNac::respondWith([AdhocRequest::class => FakeFortiNac::record(['id' => 1]), AdhocBodyRequest::class => FakeFortiNac::record(['id' => 1])]);
    $connector = FakeFortiNac::connector();

    $connector->get('/host', ['count' => 2]);
    $connector->post('host', ['hostName' => 'x']);
    $connector->put('/ssid/config', ['name' => 'y'], ['force' => 'true']);
    $connector->delete('/host/1');

    $uris = FakeFortiNac::urisReceived($mockClient, AdhocRequest::class);
    $methods = collect($mockClient->getRecordedResponses())->map(fn ($r) => $r->getPendingRequest()->getMethod()->value)->all();
    $bodies = FakeFortiNac::bodiesReceived($mockClient, AdhocRequest::class);
    $rawBodies = collect($mockClient->getRecordedResponses())->map(fn ($r) => (string) $r->getPsrRequest()->getBody())->all();

    expect($uris)->toBe([FakeFortiNac::API_URL.'/host?count=2', FakeFortiNac::API_URL.'/host', FakeFortiNac::API_URL.'/ssid/config?force=true', FakeFortiNac::API_URL.'/host/1'])
        ->and($methods)->toBe(['GET', 'POST', 'PUT', 'DELETE'])
        ->and($bodies[1])->toBe(['hostName' => 'x'])
        ->and($rawBodies[0])->toBe('')
        ->and($rawBodies[3])->toBe('')
        ->and($bodies[2])->toBe(['name' => 'y']);
});

it('gives a builder over any collection with from()', function () {
    $mockClient = FakeFortiNac::respondWith([
        AdhocListRequest::class => FakeFortiNac::list([['id' => 1, 'name' => 'a']]),
        AdhocCountRequest::class => FakeFortiNac::envelope([3]),
        AdhocRequest::class => FakeFortiNac::record(['id' => 2]),
        AdhocBodyRequest::class => FakeFortiNac::record(['id' => 3]),
    ]);
    $connector = FakeFortiNac::connector();

    $builder = $connector->from('/new-thing');
    $records = $builder->where('name', 'a')->get();

    expect($builder)->toBeInstanceOf(Builder::class)
        ->and($records->all())->toBe([['id' => 1, 'name' => 'a']])
        ->and($builder->count())->toBe(3)
        ->and($builder->find(2))->toBe(['id' => 2])
        ->and($builder->create(['name' => 'b']))->toBe(['id' => 3])
        ->and($builder->update(3, ['name' => 'c']))->toBe(['id' => 3])
        ->and($builder->delete(2))->toBeTrue()
        ->and(FakeFortiNac::urisReceived($mockClient, AdhocListRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/new-thing?filter=name%3D%3Da')
        ->and(FakeFortiNac::urisReceived($mockClient, AdhocCountRequest::class)[0])->toBe(FakeFortiNac::API_URL.'/new-thing/count?filter=name%3D%3Da')
        ->and(FakeFortiNac::urisReceived($mockClient, AdhocRequest::class))->toBe([FakeFortiNac::API_URL.'/new-thing/2', FakeFortiNac::API_URL.'/new-thing', FakeFortiNac::API_URL.'/new-thing/3', FakeFortiNac::API_URL.'/new-thing/2'])
        ->and(FakeFortiNac::urisReceived($mockClient, AdhocBodyRequest::class))->toBe([FakeFortiNac::API_URL.'/new-thing', FakeFortiNac::API_URL.'/new-thing/3'])
        ->and($connector->paginate(new ExampleListRequest))->toBeInstanceOf(FortiNacPaginator::class);
});
