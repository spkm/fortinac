<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all RADIUS Domain Mappings: GET /settings/integration/aaa-mappings.
 */
class GetAaaMappingRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings';
    }
}
