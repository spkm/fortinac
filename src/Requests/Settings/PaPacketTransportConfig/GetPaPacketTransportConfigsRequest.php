<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Persistent Agent Transport records matching the supplied filter: GET /settings/agent/pa-packet-transport-config.
 */
class GetPaPacketTransportConfigsRequest extends ListRequest
{
    protected ?string $dto = PaPacketTransportConfig::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config';
    }
}
