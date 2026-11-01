<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Data\Policy\LogicalNetwork;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records matching the supplied filter: GET /policy/logical-network.
 */
class GetLogicalNetworksRequest extends ListRequest
{
    protected ?string $dto = LogicalNetwork::class;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network';
    }
}
