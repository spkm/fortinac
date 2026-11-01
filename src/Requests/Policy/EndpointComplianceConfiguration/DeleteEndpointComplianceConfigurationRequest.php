<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Endpoint Compliance Configuration record by ID: DELETE /policy/endpoint-compliance-configuration/{id}.
 */
class DeleteEndpointComplianceConfigurationRequest extends DeleteRequest
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
        return '/policy/endpoint-compliance-configuration/'.$this->id;
    }
}
