<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of records supplied under the id parameter: POST /policy/logical-network/delete.
 *
 * Parameters: id.
 */
class DeleteManyLogicalNetworksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/logical-network/delete';
    }
}
