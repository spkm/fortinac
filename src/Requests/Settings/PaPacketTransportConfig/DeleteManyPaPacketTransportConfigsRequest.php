<?php

namespace spkm\FortiNac\Requests\Settings\PaPacketTransportConfig;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Persistent Agent Transport records supplied under the id parameter: POST /settings/agent/pa-packet-transport-config/delete.
 *
 * Parameters: id.
 */
class DeleteManyPaPacketTransportConfigsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/pa-packet-transport-config/delete';
    }
}
