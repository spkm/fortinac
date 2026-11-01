<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Endpoint Compliance Policies: POST /policy/endpoint-compliance/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapEndpointCompliancePolicyRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/rank/swap';
    }
}
