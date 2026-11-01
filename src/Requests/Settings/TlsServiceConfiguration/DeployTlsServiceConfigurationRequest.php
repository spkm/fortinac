<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Reinitializes Persistent Agent transports from the configurations in the database: POST /settings/tls-service-configuration/deploy.
 */
class DeployTlsServiceConfigurationRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/deploy';
    }
}
