<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Scan Results in the database: GET /policy/endpoint-compliance/scan/count/all.
 */
class CountAllEndpointComplianceScansRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/count/all';
    }
}
