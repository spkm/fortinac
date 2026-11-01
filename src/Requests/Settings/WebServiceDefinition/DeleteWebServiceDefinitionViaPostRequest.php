<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Web Service Definition record by ID: POST /settings/security/web-service-definition/{id}/delete.
 */
class DeleteWebServiceDefinitionViaPostRequest extends ActionRequest
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
        return '/settings/security/web-service-definition/'.$this->id.'/delete';
    }
}
