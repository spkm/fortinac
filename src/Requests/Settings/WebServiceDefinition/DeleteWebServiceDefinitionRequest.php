<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Web Service Definition records by ID: DELETE /settings/security/web-service-definition/{id}.
 */
class DeleteWebServiceDefinitionRequest extends DeleteRequest
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
        return '/settings/security/web-service-definition/'.$this->id;
    }
}
