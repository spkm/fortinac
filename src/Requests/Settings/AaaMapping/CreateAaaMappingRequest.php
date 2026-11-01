<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new RADIUS Domain Mapping: POST /settings/integration/aaa-mappings.
 *
 * Parameters: radiusServer, domainName.
 */
class CreateAaaMappingRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings';
    }
}
