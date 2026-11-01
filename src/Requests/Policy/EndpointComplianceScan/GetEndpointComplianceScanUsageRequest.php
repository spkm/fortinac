<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Endpoint Compliance Scan by ID: GET /policy/endpoint-compliance/scan/{id}/usage.
 */
class GetEndpointComplianceScanUsageRequest extends ListRequest
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
        return '/policy/endpoint-compliance/scan/'.$this->id.'/usage';
    }
}
