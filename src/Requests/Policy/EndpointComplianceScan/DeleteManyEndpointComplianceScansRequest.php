<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Endpoint Compliance Scans supplied under the ID parameter, if they are not currently in use: POST /policy/endpoint-compliance/scan/delete.
 *
 * Parameters: id.
 */
class DeleteManyEndpointComplianceScansRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/delete';
    }
}
