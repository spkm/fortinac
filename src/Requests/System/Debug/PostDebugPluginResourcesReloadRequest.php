<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Issues a request for the plugin to reload system resources or device mappings, if supported: POST /system/debug/plugin/resources/reload.
 *
 * Parameters: reloadType.
 */
class PostDebugPluginResourcesReloadRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin/resources/reload';
    }
}
