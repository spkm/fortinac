<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Endpoint Compliance Scan by ID, if it is not currently in use: DELETE /policy/endpoint-compliance/scan/{id}.
 */
class DeleteEndpointComplianceScanRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/'.$this->id;
    }
}
