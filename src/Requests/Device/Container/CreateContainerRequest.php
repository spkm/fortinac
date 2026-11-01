<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Data\Device\Container;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new container record to the database: POST /device/container.
 */
class CreateContainerRequest extends WriteRequest
{
    protected ?string $dto = Container::class;

    public function resolveEndpoint(): string
    {
        return '/device/container';
    }
}
