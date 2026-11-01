<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Scan Result records which match the supplied filter: GET /policy/endpoint-compliance/scan.
 */
class GetEndpointComplianceScansRequest extends ListRequest
{
    protected ?string $dto = EndpointComplianceScan::class;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan';
    }
}
