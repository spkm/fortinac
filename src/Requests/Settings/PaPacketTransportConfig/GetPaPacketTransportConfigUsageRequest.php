<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Persistent Agent Transport records that reference this record: GET /settings/agent/pa-packet-transport-config/{id}/usage.
 */
class GetPaPacketTransportConfigUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/'.$this->id.'/usage';
    }
}
