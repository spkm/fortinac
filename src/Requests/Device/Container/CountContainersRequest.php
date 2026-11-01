<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of Container records matching the supplied filter: GET /device/container/count.
 */
class CountContainersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/container/count';
    }
}
