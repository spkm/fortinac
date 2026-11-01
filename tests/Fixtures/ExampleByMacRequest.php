<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Requests\ItemRequest;

class ExampleByMacRequest extends ItemRequest
{
    protected ?string $dto = ExampleData::class;

    public function __construct(protected string $mac) {}

    public function resolveEndpoint(): string
    {
        return '/example/by-mac/'.rawurlencode($this->mac);
    }
}
