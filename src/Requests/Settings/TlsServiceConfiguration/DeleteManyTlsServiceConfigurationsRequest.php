<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of TLS Service Configuration records supplied under the id parameter: POST /settings/tls-service-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManyTlsServiceConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/delete';
    }
}
