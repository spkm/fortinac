<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\ListRequest;

class ExampleListRequest extends ListRequest
{
    protected ?string $dto = ExampleData::class;

    public function resolveEndpoint(): string
    {
        return '/example';
    }
}
