<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Reinitialize Persistent Agent Transports from the configurations in the database: POST /settings/agent/pa-packet-transport-config/deploy.
 */
class DeployPaPacketTransportConfigRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/deploy';
    }
}
