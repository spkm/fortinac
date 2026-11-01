<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends a message to a list of Host Records via the Persistent Agent: POST /host/send-persistent-agent-message.
 *
 * Parameters: id, message, url, duration.
 */
class SendHostPersistentAgentMessageRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/send-persistent-agent-message';
    }
}
