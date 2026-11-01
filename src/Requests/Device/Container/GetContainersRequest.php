<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Data\Device\Container;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Container records which match the supplied filter: GET /device/container.
 */
class GetContainersRequest extends ListRequest
{
    protected ?string $dto = Container::class;

    public function resolveEndpoint(): string
    {
        return '/device/container';
    }
}
