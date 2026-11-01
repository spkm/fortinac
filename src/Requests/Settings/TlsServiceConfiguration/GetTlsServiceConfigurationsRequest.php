<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of TLS service Configuration records matching the supplied filter: GET /settings/tls-service-configuration.
 */
class GetTlsServiceConfigurationsRequest extends ListRequest
{
    protected ?string $dto = TlsServiceConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration';
    }
}
