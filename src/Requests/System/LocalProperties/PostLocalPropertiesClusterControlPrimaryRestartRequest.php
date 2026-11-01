<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Restarts the Primary Control server in this cluster: POST /system/local-properties/cluster/control/primary/restart.
 */
class PostLocalPropertiesClusterControlPrimaryRestartRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/local-properties/cluster/control/primary/restart';
    }
}
