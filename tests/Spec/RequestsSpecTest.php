<?php

use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

$endpoints = require __DIR__.'/endpoints.php';

it('sends the method and path FortiNAC documents, and maps the response', function (string $class, array $args, string $method, string $path, string $shape, ?string $dto, bool $hasBody, bool $paginatable) {
    /** @var FortiNacRequest $request */
    $request = new $class(...$args);

    expect($request)->toBeInstanceOf(FortiNacRequest::class)
        ->and($request->getMethod()->value)->toBe($method)
        ->and($request->resolveEndpoint())->toBe($path)
        ->and($request->dtoClass())->toBe($dto)
        ->and($request->responseShape())->toBe($shape)
        ->and($request instanceof Paginatable)->toBe($paginatable)
        ->and($request instanceof HasBody)->toBe($hasBody)
        ->and($request->isSafe())->toBe($method === 'GET');

    $sample = ['id' => 7, 'name' => 'x'];
    $response = match ($shape) {
        'list' => FakeFortiNac::send($request, ['status' => 'success', 'errorMessage' => null, 'results' => [$sample], 'total' => 1, 'filtered' => 1]),
        'one' => FakeFortiNac::send($request, ['status' => 'success', 'errorMessage' => null, 'results' => [$sample]]),
        'scalar' => FakeFortiNac::send($request, ['status' => 'success', 'errorMessage' => null, 'results' => [], 'filtered' => null, 'total' => 7]),
        'raw' => FakeFortiNac::send($request, ['status' => 'success', 'errorMessage' => null, 'results' => ['a', 'b']]),
        default => FakeFortiNac::send($request, ['status' => 'success', 'errorMessage' => null]),
    };
    $result = $response->dto();

    expect((string) $response->getPsrRequest()->getUri())->toStartWith(FakeFortiNac::API_URL.$path);

    match ($shape) {
        'list' => $dto === null ? expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBe($sample) : expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBeInstanceOf($dto),
        'one' => $dto === null ? expect($result)->toBe($sample) : expect($result)->toBeInstanceOf($dto)->and($result)->toBeInstanceOf(Data::class),
        'scalar' => expect($result)->toBe(7),
        'raw' => expect($result)->toBe(['status' => 'success', 'errorMessage' => null, 'results' => ['a', 'b']]),
        default => expect($result)->toBeNull(),
    };

    if ($hasBody) {
        expect(json_decode((string) $response->getPsrRequest()->getBody(), true))->toBe(['name' => 'x']);
    }
})->with($endpoints);

it('lists every request class once', function () use ($endpoints) {
    $classes = collect(glob(__DIR__.'/../../src/Requests/*/*/*Request.php'))
        ->map(fn (string $file) => 'spkm\\FortiNac\\Requests\\'.basename(dirname($file, 2)).'\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
        ->sort()
        ->values();
    $listed = collect($endpoints)->map(fn (array $row) => $row[0])->sort()->values();

    expect($listed->all())->toBe($classes->all())
        ->and($listed->unique())->toHaveCount($listed->count())
        ->and($classes)->toHaveCount(1108)
        ->and(collect($endpoints)->keys()->unique())->toHaveCount(count($endpoints));
});

it('documents every request in ENDPOINTS.md', function () use ($endpoints) {
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach ($endpoints as $row) {
        expect($markdown)->toContain('`'.str_replace('spkm\\FortiNac\\Requests\\', '', $row[0]).'`');
    }
});

it('resolves every documented method and path once', function () use ($endpoints) {
    $operations = collect($endpoints)->map(fn (array $row) => $row[2].' '.$row[3]);

    expect($operations->unique())->toHaveCount($operations->count());
});
