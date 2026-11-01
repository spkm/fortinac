<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\WriteRequest;

class ExampleCreateRequest extends WriteRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
