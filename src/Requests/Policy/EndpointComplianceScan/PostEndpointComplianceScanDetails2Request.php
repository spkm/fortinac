<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the selected tests and monitors for the Endpoint Compliance Scan: POST /policy/endpoint-compliance/scan/details.
 */
class PostEndpointComplianceScanDetails2Request extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/details';
    }
}
