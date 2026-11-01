<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the selected tests and monitors for the Endpoint Compliance Scan: GET /policy/endpoint-compliance/scan/details.
 *
 * Parameters: policyName.
 */
class GetEndpointComplianceScanDetailsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: policyName
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/details';
    }
}
