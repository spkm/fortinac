<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Data\Policy\LogicalNetwork;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records matching the supplied filter: GET /policy/logical-network/{id}.
 */
class GetLogicalNetworkRequest extends ItemRequest
{
    protected ?string $dto = LogicalNetwork::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network/'.$this->id;
    }
}
