<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Host Record or records supplied, if they are not currently in use: POST /host/delete.
 *
 * Parameters: id.
 */
class DeleteManyHostsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/delete';
    }
}
