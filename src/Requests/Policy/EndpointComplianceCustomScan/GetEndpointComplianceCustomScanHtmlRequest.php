<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceCustomScan;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the HTML content of a custom scan for the supplied OS, Scan Type, and Scan Name: GET /policy/endpoint-compliance/custom-scan/html.
 *
 * Parameters: os, type, scanName, Request Body.
 */
class GetEndpointComplianceCustomScanHtmlRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: os, type, scanName, Request Body
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/custom-scan/html';
    }
}
