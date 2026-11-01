<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single TLS Service Configuration record by ID: POST /settings/tls-service-configuration/{id}/delete.
 */
class DeleteTlsServiceConfigurationViaPostRequest extends ActionRequest
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
        return '/settings/tls-service-configuration/'.$this->id.'/delete';
    }
}
