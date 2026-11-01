<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Denies one or more Host Registration requests. Requests must be pending to be denied: POST /host/registration-request/deny.
 */
class DenyRegistrationRequestRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/registration-request/deny';
    }
}
