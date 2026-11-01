<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Endpoint Compliance Configuration record by ID: POST /policy/endpoint-compliance-configuration/{id}/delete.
 */
class DeleteEndpointComplianceConfigurationViaPostRequest extends ActionRequest
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
        return '/policy/endpoint-compliance-configuration/'.$this->id.'/delete';
    }
}
