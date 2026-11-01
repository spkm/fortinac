<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of logical network records supplied under the id parameter: POST /policy/logical-network-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManyLogicalNetworkConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/delete';
    }
}
