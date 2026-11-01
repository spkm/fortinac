<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new logical network record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/logical-network-configuration.
 */
class CreateLogicalNetworkConfigurationRequest extends WriteRequest
{
    protected ?string $dto = LogicalNetworkConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration';
    }
}
