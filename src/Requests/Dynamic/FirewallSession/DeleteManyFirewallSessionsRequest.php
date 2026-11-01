<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of records supplied under the id parameter: POST /dynamic/dynamic-connection/delete.
 *
 * Parameters: id.
 */
class DeleteManyFirewallSessionsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection/delete';
    }
}
