<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single TLS Service Configuration record by ID: DELETE /settings/tls-service-configuration/{id}.
 */
class DeleteTlsServiceConfigurationRequest extends DeleteRequest
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
        return '/settings/tls-service-configuration/'.$this->id;
    }
}
