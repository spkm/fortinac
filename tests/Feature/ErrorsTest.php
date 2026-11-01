<?php

use Saloon\Http\Faking\MockResponse;
use spkm\FortiNac\Exceptions\FailedException;
use spkm\FortiNac\Exceptions\InvalidRequestException;
use spkm\FortiNac\Exceptions\NotFoundException;
use spkm\FortiNac\Exceptions\ServerErrorException;
use spkm\FortiNac\Exceptions\UnauthorizedException;
use spkm\FortiNac\FortiNacApiException;
use spkm\FortiNac\Tests\Fixtures\ExampleCreateRequest;
use spkm\FortiNac\Tests\Fixtures\ExampleItemRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

it('throws the exception for the status', function (int $status, string $class) {
    FakeFortiNac::respondWith([ExampleItemRequest::class => FakeFortiNac::failure('Something happened', $status)]);
    $response = FakeFortiNac::connector()->send(new ExampleItemRequest(1));

    expect(fn () => $response->dto())->toThrow($class, "FortiNAC responded $status to GET /api/v2/example/1: Something happened");
})->with([
    [404, NotFoundException::class],
    [401, UnauthorizedException::class],
    [403, UnauthorizedException::class],
    [400, InvalidRequestException::class],
    [405, InvalidRequestException::class],
    [406, InvalidRequestException::class],
    [415, InvalidRequestException::class],
    [422, InvalidRequestException::class],
    [408, ServerErrorException::class],
    [500, ServerErrorException::class],
    [503, ServerErrorException::class],
    [418, FortiNacApiException::class],
    [200, FailedException::class],
]);

it('gives the error message FortiNAC sent', function () {
    FakeFortiNac::respondWith([ExampleCreateRequest::class => FakeFortiNac::failure('Template not found')]);

    try {
        FakeFortiNac::connector()->send(new ExampleCreateRequest(['name' => '']))->dto();
        $this->fail('No exception');
    } catch (FailedException $exception) {
        expect($exception)->toBeInstanceOf(FortiNacApiException::class)
            ->and($exception->errorMessage())->toBe('Template not found')
            ->and($exception->getResponse()->status())->toBe(200)
            ->and($exception->getMessage())->toBe('FortiNAC responded 200 to POST /api/v2/example: Template not found');
    }
});

it('reads a message from an answer without the envelope', function () {
    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make(['message' => 'Unauthorized', 'path' => '/api/v2/example/1'], 401)]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(UnauthorizedException::class, 'FortiNAC responded 401 to GET /api/v2/example/1: Unauthorized');

    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make(['error' => 'Bad Request', 'detail' => 'ignored'], 400)]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(InvalidRequestException::class, 'FortiNAC responded 400 to GET /api/v2/example/1: Bad Request');

    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make(['status' => 'failure', 'errorMessage' => null, 'results' => []], 500)]);
    try {
        FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto();
    } catch (ServerErrorException $exception) {
        expect($exception->errorMessage())->toBeNull()
            ->and($exception->getMessage())->toBe('FortiNAC responded 500 to GET /api/v2/example/1: status failure');
    }
});

it('describes an answer that is not the envelope', function () {
    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make('<html><head><title>502 Bad Gateway</title></head></html>', 502, ['Content-Type' => 'text/html'])]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, "FortiNAC responded 502 to GET /api/v2/example/1 with an HTML error page ('502 Bad Gateway')");

    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make('Service down', 503)]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, 'FortiNAC responded 503 to GET /api/v2/example/1: Service down');

    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make('', 500)]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(ServerErrorException::class, 'FortiNAC responded 500 to GET /api/v2/example/1');

    FakeFortiNac::respondWith([ExampleItemRequest::class => MockResponse::make([['list']], 404)]);
    expect(fn () => FakeFortiNac::connector()->send(new ExampleItemRequest(1))->dto())
        ->toThrow(NotFoundException::class, 'FortiNAC responded 404 to GET /api/v2/example/1');
});
