<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use spkm\FortiNac\Facades\FortiNac;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\FortiNacService;
use spkm\FortiNac\FortiNacServiceProvider;
use spkm\FortiNac\Tests\Fixtures\ExampleListRequest;
use spkm\FortiNac\Tests\Helpers\FakeFortiNac;

it('binds the service as a singleton behind the facade', function () {
    expect(app('fortinac'))->toBeInstanceOf(FortiNacService::class)
        ->and(app('fortinac'))->toBe(app('fortinac'))
        ->and(FortiNac::getFacadeRoot())->toBe(app('fortinac'));
});

it('loads the config with its environment names', function () {
    expect(config('fortinac'))->toHaveKeys(['base_url', 'token', 'verify', 'connections', 'timeouts', 'retries', 'cache', 'pagination'])
        ->and(config('fortinac.pagination.per_page'))->toBe(100)
        ->and(config('fortinac.verify'))->toBeTrue()
        ->and(file_get_contents(__DIR__.'/../../config/fortinac.php'))->toContain("env('FORTINAC_BASE_URL')", "env('FORTINAC_TOKEN')", "env('FORTINAC_VERIFY', true)", "env('FORTINAC_RETRIES')", "env('FORTINAC_CACHE', false)");
});

it('registers the install command and the config to publish', function () {
    $paths = ServiceProvider::pathsToPublish(FortiNacServiceProvider::class, 'fortinac-config');

    expect(Artisan::all())->toHaveKey('fortinac:install')
        ->and($paths)->toHaveCount(1)
        ->and(realpath((string) array_key_first($paths)))->toBe(realpath(__DIR__.'/../../config/fortinac.php'))
        ->and(array_values($paths)[0])->toBe(config_path('fortinac.php'));
});

it('builds the default connector from config the first time it is used', function () {
    config()->set('fortinac.base_url', 'https://nac.school.test:8443/');
    config()->set('fortinac.token', 'the-token');
    config()->set('fortinac.verify', false);
    $mockClient = FakeFortiNac::respondWith([ExampleListRequest::class => FakeFortiNac::list([])]);

    FortiNac::send(new ExampleListRequest);

    expect(FakeFortiNac::received($mockClient, ExampleListRequest::class)->getUrl())->toBe('https://nac.school.test:8443/api/v2/example')
        ->and(FakeFortiNac::received($mockClient, ExampleListRequest::class)->headers()->get('Authorization'))->toBe('Bearer the-token')
        ->and(FakeFortiNac::received($mockClient, ExampleListRequest::class)->config()->get('verify'))->toBeFalse();
});

it('reads the verify setting as a boolean or a CA bundle path, leaving verification on when it is unclear', function (mixed $given, bool|string $expected) {
    config()->set('fortinac.connections.other', ['base_url' => 'https://other.test:8443', 'token' => 'other-token', 'verify' => $given]);

    expect(FortiNac::connection('other')->verifies())->toBe($expected);
})->with([
    [true, true],
    [false, false],
    ['false', false],
    ['0', false],
    ['off', false],
    ['true', true],
    ['1', true],
    ['', true],
    [null, true],
    ['/etc/ssl/nac.pem', '/etc/ssl/nac.pem'],
]);

it('says which setting the default connection is missing', function (string $setting) {
    config()->set('fortinac.base_url', 'https://nac.school.test:8443');
    config()->set('fortinac.token', 'the-token');
    config()->set("fortinac.$setting", '');

    expect(fn () => FortiNac::send(new ExampleListRequest))->toThrow(InvalidArgumentException::class, "The default FortiNAC connection needs a $setting.");
})->with(['base_url', 'token']);

it('gives a named connection its own connector, once', function () {
    config()->set('fortinac.connections.other', ['base_url' => 'https://other.test:8443', 'token' => 'other-token']);

    $connection = FortiNac::connection('other');

    expect($connection)->toBeInstanceOf(FortiNacConnector::class)
        ->and($connection->resolveBaseUrl())->toBe('https://other.test:8443/api/v2')
        ->and($connection->verifies())->toBeTrue()
        ->and(FortiNac::connection('other'))->toBe($connection)
        ->and(fn () => FortiNac::connection('missing'))->toThrow(InvalidArgumentException::class, 'No FortiNAC connection named "missing"');

    config()->set('fortinac.connections.broken', ['base_url' => 'https://x.test']);
    expect(fn () => FortiNac::connection('broken'))->toThrow(InvalidArgumentException::class, 'The FortiNAC connection "broken" needs a token.');
});

it('refuses a method the connector does not have', function () {
    config()->set('fortinac.base_url', 'https://nac.school.test:8443');
    config()->set('fortinac.token', 'the-token');

    expect(fn () => FortiNac::nothing())->toThrow(BadMethodCallException::class, 'Method nothing does not exist.');
});
