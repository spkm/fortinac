<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Adapter records or the records supplied, if they are not currently in use: POST /adapter/delete.
 *
 * Parameters: id.
 */
class DeleteManyAdaptersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/adapter/delete';
    }
}
