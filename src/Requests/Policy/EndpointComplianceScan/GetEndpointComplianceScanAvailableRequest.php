<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the full set of tests and custom scans available for each operating system: GET /policy/endpoint-compliance/scan/available.
 */
class GetEndpointComplianceScanAvailableRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/available';
    }
}
