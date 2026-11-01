<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the logged on user for the Host Record that matches the supplied mac address: POST /host/set-logged-on-user.
 *
 * Parameters: mac, userID.
 */
class SetHostLoggedOnUserRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/set-logged-on-user';
    }
}
