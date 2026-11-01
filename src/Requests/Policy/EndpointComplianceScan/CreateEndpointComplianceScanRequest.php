<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Endpoint Compliance Scan record: POST /policy/endpoint-compliance/scan.
 */
class CreateEndpointComplianceScanRequest extends WriteRequest
{
    protected ?string $dto = EndpointComplianceScan::class;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan';
    }
}
