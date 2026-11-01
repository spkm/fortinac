<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Tests\Fixtures\ExampleChild;
use spkm\FortiNac\Tests\Fixtures\ExampleData;
use spkm\FortiNac\Tests\Fixtures\ExampleIsoData;

it('builds a model from FortiNAC\'s values, casting as the properties say', function () {
    $model = ExampleData::from([
        'id' => '12',
        'name' => 7,
        'enabled' => 'true',
        'ratio' => '1.5',
        'creationTime' => 1767225600250,
        'tags' => ['a', 'b'],
        'parent' => ['id' => 1, 'label' => 'p'],
        'children' => [['id' => 2, 'label' => 'c'], ['id' => 3]],
        'DisableTLS1.0' => false,
        'landscape' => 'Example School',
    ]);

    expect($model->id)->toBe(12)
        ->and($model->name)->toBe('7')
        ->and($model->enabled)->toBeTrue()
        ->and($model->ratio)->toBe(1.5)
        ->and($model->creationTime)->toBeInstanceOf(CarbonImmutable::class)
        ->and($model->creationTime->toIso8601ZuluString('millisecond'))->toBe('2026-01-01T00:00:00.250Z')
        ->and($model->tags)->toBe(['a', 'b'])
        ->and($model->parent)->toBeInstanceOf(ExampleChild::class)
        ->and($model->parent->label)->toBe('p')
        ->and($model->children)->toBeInstanceOf(Collection::class)
        ->and($model->children->map->id->all())->toBe([2, 3])
        ->and($model->disable_tls_1_0)->toBeFalse()
        ->and($model->extra)->toBe(['landscape' => 'Example School']);
});

it('serialises back to FortiNAC\'s keys, leaving out what is null', function () {
    $model = ExampleData::from(['id' => 1, 'creationTime' => 1767225600250, 'children' => [['id' => 2]], 'DisableTLS1.0' => true, 'landscape' => 'x']);

    expect($model->toArray())->toBe(['landscape' => 'x', 'id' => 1, 'creationTime' => 1767225600250, 'children' => [['id' => 2]], 'DisableTLS1.0' => true])
        ->and(json_decode(json_encode($model), true))->toBe($model->toArray())
        ->and(ExampleData::from([])->toArray())->toBe([]);
});

it('reads dates as timestamps in milliseconds or seconds, or as strings, and sends them back as the model says', function () {
    $fromMs = ExampleData::from(['creationTime' => 1767225600250]);
    $fromSeconds = ExampleData::from(['creationTime' => 1767225600]);
    $fromString = ExampleData::from(['creationTime' => '2026-01-01T00:00:00.250+0000']);
    $iso = ExampleIsoData::from(['id' => 1, 'creationTime' => '2024-02-15T23:03:19.954+0000']);

    expect($fromMs->creationTime?->toIso8601ZuluString('millisecond'))->toBe('2026-01-01T00:00:00.250Z')
        ->and($fromSeconds->creationTime?->toIso8601ZuluString('millisecond'))->toBe('2026-01-01T00:00:00.000Z')
        ->and($fromString->toArray())->toBe(['creationTime' => 1767225600250])
        ->and(ExampleData::from(['creationTime' => '1767225600'])->creationTime?->timestamp)->toBe(1767225600)
        ->and(ExampleData::from(['creationTime' => 0])->creationTime)->toBeNull()
        ->and(ExampleData::from(['creationTime' => ''])->creationTime)->toBeNull()
        ->and(ExampleData::from(['creationTime' => 'not a date'])->creationTime)->toBeNull()
        ->and($iso->creationTime?->toIso8601ZuluString('millisecond'))->toBe('2024-02-15T23:03:19.954Z')
        ->and($iso->toArray())->toBe(['id' => 1, 'creationTime' => '2024-02-15T23:03:19.954+0000'])
        ->and(ExampleIsoData::dateFormat())->toBe('Y-m-d\TH:i:s.vO')
        ->and(ExampleData::dateFormat())->toBe('Uv');
});

it('keeps the fields FortiNAC stores beyond the documented ones, unless the model says not to', function () {
    $model = ExampleData::from(['id' => 1, 'name' => 'h', 'landscape' => 'Example School', 'clientID' => 7]);

    expect($model->extra)->toBe(['landscape' => 'Example School', 'clientID' => 7])
        ->and($model->toArray())->toBe(['landscape' => 'Example School', 'clientID' => 7, 'id' => 1, 'name' => 'h'])
        ->and(ExampleData::from(['id' => 1, 'extra' => 'x'])->toArray())->toBe(['extra' => 'x', 'id' => 1])
        ->and(ExampleChild::from(['id' => 1, 'anything' => 'x'])->toArray())->toBe(['id' => 1]);
});

it('collects a list of records', function () {
    $models = ExampleChild::collect([['id' => 1], ['id' => 2]]);

    expect($models)->toHaveCount(2)
        ->and($models->first())->toBeInstanceOf(ExampleChild::class)
        ->and(ExampleChild::collect(null))->toHaveCount(0);
});

it('leaves secrets out of a record unless asked for them, and never lets $extra override a property', function () {
    $secret = new readonly class(['id' => 9, 'password' => 'from-extra'], 5, 'hunter2', 'abc') extends Data
    {
        protected const HIDDEN = ['password', 'apiAccessToken'];

        public function __construct(public array $extra = [], public ?int $id = null, public ?string $password = null, public ?string $apiAccessToken = null) {}
    };

    expect($secret->toArray())->toBe(['id' => 5, 'password' => 'from-extra'])
        ->and($secret->toArray(true))->toBe(['id' => 5, 'password' => 'hunter2', 'apiAccessToken' => 'abc'])
        ->and(json_decode(json_encode($secret), true))->toBe(['id' => 5, 'password' => 'from-extra'])
        ->and($secret::hidden())->toBe(['password', 'apiAccessToken']);
});
