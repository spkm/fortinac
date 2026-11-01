<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Persistent Agent Transport record by ID: DELETE /settings/agent/pa-packet-transport-config/{id}.
 */
class DeletePaPacketTransportConfigRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/'.$this->id;
    }
}
