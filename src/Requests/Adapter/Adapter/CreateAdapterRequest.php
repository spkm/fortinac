<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Adapter record to the database: POST /adapter.
 */
class CreateAdapterRequest extends WriteRequest
{
    protected ?string $dto = Adapter::class;

    public function resolveEndpoint(): string
    {
        return '/adapter';
    }
}
