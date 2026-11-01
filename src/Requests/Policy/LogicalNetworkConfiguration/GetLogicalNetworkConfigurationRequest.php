<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Data\Policy\LogicalNetworkConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of logical network records matching the supplied filter: GET /policy/logical-network-configuration/{id}.
 */
class GetLogicalNetworkConfigurationRequest extends ItemRequest
{
    protected ?string $dto = LogicalNetworkConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/'.$this->id;
    }
}
