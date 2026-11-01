<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Creates a new TLS Service Configuration record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/tls-service-configuration.
 */
class CreateTlsServiceConfigurationRequest extends ActionRequest
{
    protected ?string $dto = TlsServiceConfiguration::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration';
    }
}
