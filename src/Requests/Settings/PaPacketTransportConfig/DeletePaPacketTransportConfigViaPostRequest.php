<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Persistent Agent Transport record by ID: POST /settings/agent/pa-packet-transport-config/{id}/delete.
 */
class DeletePaPacketTransportConfigViaPostRequest extends ActionRequest
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
        return '/settings/agent/pa-packet-transport-config/'.$this->id.'/delete';
    }
}
