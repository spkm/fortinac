<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends a message to a list of Host Records via the Persistent Agent: POST /host/set-expiration.
 *
 * Parameters: id, setExpiration, setInactivity, expireDays, expireDateMS, InactiveDays.
 */
class SetHostExpirationRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/set-expiration';
    }
}
