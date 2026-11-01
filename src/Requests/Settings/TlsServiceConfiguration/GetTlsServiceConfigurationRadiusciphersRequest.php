<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the list of iana ciphers with a corresponding openssi version for use with radius: GET /settings/tls-service-configuration/radiusciphers.
 */
class GetTlsServiceConfigurationRadiusciphersRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/radiusciphers';
    }
}
