<?php

namespace spkm\FortiNac\Requests\Policy\PortalConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single portal policy record by ID: DELETE /policy/portal-configuration/{id}.
 */
class DeletePortalConfigurationRequest extends DeleteRequest
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
        return '/policy/portal-configuration/'.$this->id;
    }
}
