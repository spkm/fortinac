<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all Custom Scans currently stored in the filesystem: GET /policy/endpoint-compliance/custom-scan.
 */
class GetEndpointComplianceCustomScanRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/custom-scan';
    }
}
