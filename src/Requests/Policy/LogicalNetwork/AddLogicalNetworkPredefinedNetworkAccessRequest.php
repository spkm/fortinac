<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a predefined set of Logical Networks and Policies: POST /policy/logical-network/add-predefined-network-access.
 */
class AddLogicalNetworkPredefinedNetworkAccessRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/logical-network/add-predefined-network-access';
    }
}
