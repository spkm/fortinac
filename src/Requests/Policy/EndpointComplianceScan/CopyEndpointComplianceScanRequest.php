<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Copies all content from the supplied Scan to a new Scan: POST /policy/endpoint-compliance/scan/copy.
 *
 * Parameters: policyName, newPolicyName.
 */
class CopyEndpointComplianceScanRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/copy';
    }
}
