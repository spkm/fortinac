<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Removes endpoint compliance policy objects for the supplied policy name: POST /policy/endpoint-compliance/scan/remove-policy-types.
 */
class RemoveEndpointComplianceScanPolicyTypesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/remove-policy-types';
    }
}
