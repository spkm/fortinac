<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Approves one or more Host Registration requests. Requests must be pending to be approved: POST /host/registration-request/approve.
 */
class ApproveRegistrationRequestRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/registration-request/approve';
    }
}
