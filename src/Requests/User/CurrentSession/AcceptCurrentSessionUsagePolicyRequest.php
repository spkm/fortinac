<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Performs a login which accepts the Acceptable Usage Policy. The login step must be repeated because the session is not valid until the Acceptable Usage Policy is accepted: POST /user/current-session/accept-usage-policy.
 *
 * Parameters: user, password.
 */
class AcceptCurrentSessionUsagePolicyRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/accept-usage-policy';
    }
}
