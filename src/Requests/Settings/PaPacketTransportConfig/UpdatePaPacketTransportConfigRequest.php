<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\PaPacketTransportConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Persistent Agent Transport record: POST /settings/agent/pa-packet-transport-config/{id}.
 */
class UpdatePaPacketTransportConfigRequest extends WriteRequest
{
    protected ?string $dto = PaPacketTransportConfig::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/'.$this->id;
    }
}
