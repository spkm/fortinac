<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new Custom Scan for the supplied OS of the supplied type: POST /policy/endpoint-compliance/custom-scan/custom-scan.
 *
 * Parameters: osName, csType, scanName, formData, isModify, modify, global.
 */
class PostEndpointComplianceCustomScanCustomScanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/custom-scan/custom-scan';
    }
}
