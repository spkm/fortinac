<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;

$models = collect(glob(__DIR__.'/../../src/Data/*/*.php'))
    ->map(fn (string $file) => 'spkm\\FortiNac\\Data\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
    ->mapWithKeys(fn (string $class) => [str_replace('spkm\\FortiNac\\Data\\', '', $class) => [$class]])
    ->all();

it('builds every model from FortiNAC\'s values and serialises it back', function (string $class) {
    $attributes = [];
    $expected = [];
    $reflection = new ReflectionClass($class);
    $aliases = $reflection->getConstant('ALIASES') ?: [];
    $dateFormat = $reflection->getConstant('DATE_FORMAT');

    foreach ($reflection->getConstructor()->getParameters() as $parameter) {
        $type = $parameter->getType();
        $name = $parameter->getName();
        $key = $aliases[$name] ?? $name;
        expect($type)->toBeInstanceOf(ReflectionNamedType::class)
            ->and($parameter->isDefaultValueAvailable())->toBeTrue()
            ->and($name)->toMatch('/^[A-Za-z_]\w*$/');

        if ($name === 'extra') {
            continue;
        }

        [$attributes[$key], $expected[$key]] = match ($type->getName()) {
            'int' => ['12', 12],
            'float' => ['1.5', 1.5],
            'bool' => ['true', true],
            'string' => [7, '7'],
            'array' => [['a' => 1], ['a' => 1]],
            'mixed' => ['x', 'x'],
            CarbonImmutable::class => ['2026-01-01T00:00:00.000+00:00', match ($dateFormat) {
                'Uv' => 1767225600000,
                'U' => 1767225600,
                default => CarbonImmutable::parse('2026-01-01T00:00:00.000+00:00')->format($dateFormat),
            }],
            Collection::class => [[[]], [[]]],
            default => is_subclass_of($type->getName(), Data::class) ? [[], []] : throw new LogicException("$class::$name has an unexpected type"),
        };
    }

    $model = $class::from([...$attributes, 'undocumented' => 'kept']);

    expect($model)->toBeInstanceOf(Data::class)
        ->and($model->toArray())->toBe([...$expected, 'undocumented' => 'kept'])
        ->and($model->extra)->toBe(['undocumented' => 'kept'])
        ->and($class::from([]))->toBeInstanceOf($class)
        ->and($class::from([])->toArray())->toBe([]);
})->with($models);

it('returns a model class from every request that names one', function () use ($models) {
    $endpoints = require __DIR__.'/endpoints.php';
    $classes = array_map(fn (array $row) => $row[0], $models);
    $used = [];

    foreach ($endpoints as $name => [, , , , $shape, $dto]) {
        if ($dto !== null) {
            expect(in_array($dto, $classes, true))->toBeTrue("$name returns $dto, which is not a model")
                ->and(in_array($shape, ['one', 'list'], true))->toBeTrue("$name names a model for a $shape response");
            $used[$dto] = true;
        }
    }

    expect(count($models))->toBeGreaterThan(150)
        ->and(array_values(array_diff($classes, array_keys($used))))->toBe([]);
});
