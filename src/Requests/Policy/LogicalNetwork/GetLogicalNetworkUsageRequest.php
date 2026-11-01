<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this record: GET /policy/logical-network/{id}/usage.
 */
class GetLogicalNetworkUsageRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected int $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/logical-network/'.$this->id.'/usage';
    }
}
