<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Host Registration Request records matching the supplied filter: GET /policy/logical-network-configuration.
 */
class GetLogicalNetworkConfigurationsRequest extends ListRequest
{
    protected ?string $dto = LogicalNetworkConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration';
    }
}
