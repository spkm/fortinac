<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the default RADIUS servers, primary and secondary, to use if there are no mappings: GET /settings/integration/aaa-mappings/defaults.
 */
class GetAaaMappingDefaultsRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/defaults';
    }
}
