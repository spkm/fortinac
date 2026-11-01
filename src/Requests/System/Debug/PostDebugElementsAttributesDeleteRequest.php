<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes one or more attributes stored by the system on the elements of a given type and DBID. Allowed types are host, adapter, user, device, and nselem: POST /system/debug/elements/attributes/delete.
 *
 * Parameters: type, id, attrName.
 */
class PostDebugElementsAttributesDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/elements/attributes/delete';
    }
}
