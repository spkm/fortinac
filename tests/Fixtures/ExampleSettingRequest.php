<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\ItemRequest;

class ExampleSettingRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example-setting';
    }
}
