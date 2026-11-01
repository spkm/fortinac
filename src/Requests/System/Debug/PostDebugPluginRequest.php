<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the debug status to be enabled or disabled for one or more plugins: POST /system/debug/plugin.
 *
 * Parameters: enable, plugin.
 */
class PostDebugPluginRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin';
    }
}
