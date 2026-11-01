<?php

namespace spkm\FortiNac\Requests\Settings\EmailSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Returns the password for the currently configured e-mail server. This is done separately so that passwords may be restricted: POST /settings/integration/email/password.
 */
class PostEmailSettingsPasswordRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/email/password';
    }
}
