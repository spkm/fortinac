<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Endpoint Compliance Policy records supplied under the id parameter: POST /policy/endpoint-compliance/delete.
 *
 * Parameters: id.
 */
class DeleteManyEndpointCompliancePoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/delete';
    }
}
