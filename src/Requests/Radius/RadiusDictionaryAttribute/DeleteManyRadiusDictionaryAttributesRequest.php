<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete multiple user-defined RADIUS dictionary entries by ID: POST /radius/dictionary/delete.
 *
 * Parameters: id.
 */
class DeleteManyRadiusDictionaryAttributesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/radius/dictionary/delete';
    }
}
