<?php

namespace spkm\FortiNac\Requests\Settings\LogReceiver;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete a Log Receiver: POST /settings/integration/log-receiver/delete.
 *
 * Parameters: dbid.
 */
class DeleteManyLogReceiversRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/log-receiver/delete';
    }
}
