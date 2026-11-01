<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Performs add or modify requests for a series of logical network configurations at once: POST /policy/logical-network-configuration/batch-upsert.
 */
class BatchLogicalNetworkConfigurationUpsertRequest extends WriteRequest
{
    protected ?string $dto = LogicalNetworkConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/batch-upsert';
    }
}
