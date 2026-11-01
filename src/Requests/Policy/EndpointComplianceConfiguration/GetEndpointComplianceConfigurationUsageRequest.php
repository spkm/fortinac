<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Endpoint Compliance Configuration record: GET /policy/endpoint-compliance-configuration/{id}/usage.
 */
class GetEndpointComplianceConfigurationUsageRequest extends ListRequest
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
        return '/policy/endpoint-compliance-configuration/'.$this->id.'/usage';
    }
}
