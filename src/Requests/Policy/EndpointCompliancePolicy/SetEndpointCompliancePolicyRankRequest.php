<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Endpoint Compliance Policy, shifting other ranks as necessary: POST /policy/endpoint-compliance/rank/set.
 *
 * Parameters: id, rank.
 */
class SetEndpointCompliancePolicyRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/rank/set';
    }
}
