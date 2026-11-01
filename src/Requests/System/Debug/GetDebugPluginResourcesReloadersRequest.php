<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the list of plugins able to dynamically reload system resources: GET /system/debug/plugin/resources/reloaders.
 */
class GetDebugPluginResourcesReloadersRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin/resources/reloaders';
    }
}
