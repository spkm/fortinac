<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Endpoint Compliance Policy record by ID: POST /policy/endpoint-compliance/{id}/delete.
 */
class DeleteEndpointCompliancePolicyViaPostRequest extends ActionRequest
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
        return '/policy/endpoint-compliance/'.$this->id.'/delete';
    }
}
