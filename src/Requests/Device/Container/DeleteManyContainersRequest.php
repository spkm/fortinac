<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Container record supplied, if they are not currently in use: POST /device/container/delete.
 */
class DeleteManyContainersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/device/container/delete';
    }
}
