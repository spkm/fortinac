<?php

namespace spkm\FortiNac\Tests\Helpers;

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\FortiNac\FortiNacConnector;

class FakeFortiNac
{
    public const BASE_URL = 'https://nac.example.test:8443';

    public const API_URL = 'https://nac.example.test:8443/api/v2';

    /**
     * Fake FortiNAC: each request class answers with the given response.
     *
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = []): MockClient
    {
        MockClient::destroyGlobal();

        return MockClient::global($responses);
    }

    public static function connector(string $baseUrl = self::BASE_URL, string $token = 'fake-token', bool|string $verify = true): FortiNacConnector
    {
        return new FortiNacConnector($baseUrl, $token, $verify);
    }

    /**
     * An answer as FortiNAC sends it: {"status": "success", "errorMessage": null, "results": [...], "total": n,
     * "filtered": n}.
     *
     * @param  list<array<string, mixed>>|array<string, mixed>|int|string|null  $results
     */
    public static function envelope(array|int|string|null $results = [], ?int $total = null, ?int $filtered = null, int $status = 200): MockResponse
    {
        $body = ['status' => 'success', 'errorMessage' => null, 'results' => $results];

        if ($total !== null) {
            $body['total'] = $total;
            $body['filtered'] = $filtered ?? $total;
        }

        return MockResponse::make($body, $status);
    }

    /**
     * A page of records, with the total FortiNAC gives alongside when one is given.
     *
     * @param  list<array<string, mixed>>  $items
     */
    public static function list(array $items, ?int $total = null, ?int $filtered = null): MockResponse
    {
        return self::envelope($items, $total, $filtered);
    }

    /**
     * One record, as FortiNAC answers a request for it: the one element of results.
     *
     * @param  array<string, mixed>  $record
     */
    public static function record(array $record, int $status = 200): MockResponse
    {
        return self::envelope([$record], status: $status);
    }

    /**
     * FortiNAC's answer when a request failed: the envelope with a status other than success and an errorMessage,
     * on whatever HTTP status it chose.
     */
    public static function failure(string $message, int $status = 200): MockResponse
    {
        return MockResponse::make(['status' => 'failure', 'errorMessage' => $message, 'results' => []], $status);
    }

    /**
     * Send one request through a connector to a faked FortiNAC that answers it with the given body.
     *
     * @param  array<mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public static function send(Request $request, array|string $body = [], int $status = 200, array $headers = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body, $status, $headers)]);

        return self::connector()->send($request);
    }

    /**
     * The request FortiNAC received for the given request class, as Saloon built it.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function received(MockClient $mockClient, string $requestClass): PendingRequest
    {
        return $mockClient->findResponseByRequest($requestClass)->getPendingRequest();
    }

    /**
     * The query strings FortiNAC received for every request of the given class, in the order they were sent.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<array<string, mixed>>
     */
    public static function queriesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => $response->getPendingRequest()->query()->all())
            ->values()
            ->all();
    }

    /**
     * The URIs FortiNAC received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function urisReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => (string) $response->getPsrRequest()->getUri())
            ->values()
            ->all();
    }

    /**
     * The JSON bodies FortiNAC received for every request of the given class.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<mixed>
     */
    public static function bodiesReceived(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->map(fn (Response $response) => json_decode((string) $response->getPsrRequest()->getBody(), true))
            ->values()
            ->all();
    }
}
