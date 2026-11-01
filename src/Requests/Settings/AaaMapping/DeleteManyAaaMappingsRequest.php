<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Deletes one or more RADIUS Domain Mappings: POST /settings/integration/aaa-mappings/delete.
 */
class DeleteManyAaaMappingsRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/delete';
    }
}
