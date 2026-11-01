<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Restarts the Primary Application server in this cluster: POST /system/local-properties/cluster/application/primary/restart.
 */
class PostLocalPropertiesClusterApplicationPrimaryRestartRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/cluster/application/primary/restart';
    }
}
