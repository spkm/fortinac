<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Reinitialize Persistent Agent Transports from the configurations in the database: GET /settings/agent/pa-packet-transport-config/performance.
 */
class GetPaPacketTransportConfigPerformanceRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/performance';
    }
}
