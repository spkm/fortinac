<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Endpoint Compliance Configuration records supplied under the id parameter: POST /policy/endpoint-compliance-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManyEndpointComplianceConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration/delete';
    }
}
