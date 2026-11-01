<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Endpoint Compliance Scan by ID, if it is not currently in use: POST /policy/endpoint-compliance/scan/{id}/delete.
 *
 * Parameters: id.
 */
class DeleteEndpointComplianceScanViaPostRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/'.$this->id.'/delete';
    }
}
