<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Updates an TLS Service Configuration record: POST /settings/tls-service-configuration/{id}.
 */
class UpdateTlsServiceConfigurationRequest extends ActionRequest
{
    protected ?string $dto = TlsServiceConfiguration::class;

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
