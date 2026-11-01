<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Custom Scan record: GET /policy/endpoint-compliance/custom-scan/usage.
 *
 * Parameters: os, scanType, scanName, Request Body.
 */
class GetEndpointComplianceCustomScanUsageRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: os, scanType, scanName, Request Body
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/custom-scan/usage';
    }
}
