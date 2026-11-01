<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of Container records in the database: GET /device/container/count/all.
 */
class CountAllContainersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/device/container/count/all';
    }
}
