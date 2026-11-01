<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this logical network record: GET /policy/logical-network-configuration/{id}/usage.
 */
class GetLogicalNetworkConfigurationUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network-configuration/'.$this->id.'/usage';
    }
}
