<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current list of plugins defined for the system: GET /system/debug/plugin-names.
 */
class GetDebugPluginNamesRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin-names';
    }
}
