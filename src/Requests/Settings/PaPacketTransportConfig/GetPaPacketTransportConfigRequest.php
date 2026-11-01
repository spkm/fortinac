<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Persistent Agent Transport records matching the supplied filter: GET /settings/agent/pa-packet-transport-config/{id}.
 */
class GetPaPacketTransportConfigRequest extends ItemRequest
{
    protected ?string $dto = PaPacketTransportConfig::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/'.$this->id;
    }
}
