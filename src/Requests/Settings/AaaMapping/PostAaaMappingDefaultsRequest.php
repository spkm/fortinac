<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Saves the Primary and Secondary RADIUS servers to use as defaults: POST /settings/integration/aaa-mappings/defaults.
 *
 * Parameters: pimaryRadiusServer, secondaryRadiusServer, radiusProxyAuthEnabled, radiusProxyAcctEnabled, radiusProxyAuthPort, radiusProxyAcctPort.
 */
class PostAaaMappingDefaultsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/defaults';
    }
}
