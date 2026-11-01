<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use JsonSerializable;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the selected tests and monitors for the Endpoint Compliance Scan: POST /policy/endpoint-compliance/scan/{id}/details.
 */
class PostEndpointComplianceScanDetailsRequest extends WriteRequest
{
    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/'.$this->id.'/details';
    }
}
