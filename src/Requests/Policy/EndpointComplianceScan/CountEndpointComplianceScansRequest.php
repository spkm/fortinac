<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Gets a count of Scan Results that match the provided filter: GET /policy/endpoint-compliance/scan/count.
 */
class CountEndpointComplianceScansRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/count';
    }
}
