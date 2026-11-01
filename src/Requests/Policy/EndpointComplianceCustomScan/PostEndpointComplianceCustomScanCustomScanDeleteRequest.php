<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a custom scan uniquely identified by its combination of OS, scan type, and scan name: POST /policy/endpoint-compliance/custom-scan/custom-scan/delete.
 *
 * Parameters: os, scanType, scanName.
 */
class PostEndpointComplianceCustomScanCustomScanDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/custom-scan/custom-scan/delete';
    }
}
