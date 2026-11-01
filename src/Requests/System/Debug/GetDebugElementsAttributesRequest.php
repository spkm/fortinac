<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Data\System\DebugElementsAttribute;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns attributes stored by the system on the elements of a given type and DBID. Allowed types are host, adapter, user, device, and nselem: GET /system/debug/elements/attributes.
 */
class GetDebugElementsAttributesRequest extends ListRequest
{
    protected ?string $dto = DebugElementsAttribute::class;

    public function resolveEndpoint(): string
    {
        return '/system/debug/elements/attributes';
    }
}
