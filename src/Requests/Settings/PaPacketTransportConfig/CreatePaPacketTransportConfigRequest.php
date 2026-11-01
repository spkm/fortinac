<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Persistent Agent Transport record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/agent/pa-packet-transport-config.
 */
class CreatePaPacketTransportConfigRequest extends WriteRequest
{
    protected ?string $dto = PaPacketTransportConfig::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config';
    }
}
