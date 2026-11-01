<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Host Record to the database: POST /host/with-adapters.
 */
class PostHostWithAdaptersRequest extends WriteRequest
{
    protected ?string $dto = Host::class;

    public function resolveEndpoint(): string
    {
        return '/host/with-adapters';
    }
}
