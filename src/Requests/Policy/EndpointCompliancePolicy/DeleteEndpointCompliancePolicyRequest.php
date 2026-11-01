<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Endpoint Compliance Policy record by ID: DELETE /policy/endpoint-compliance/{id}.
 */
class DeleteEndpointCompliancePolicyRequest extends DeleteRequest
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
        return '/policy/endpoint-compliance/'.$this->id;
    }
}
