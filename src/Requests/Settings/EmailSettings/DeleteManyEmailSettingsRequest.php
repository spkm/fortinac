<?php

namespace spkm\FortiNac\Requests\Settings\EmailSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Resets the e-mail server settings for this appliance: POST /settings/integration/email/delete.
 */
class DeleteManyEmailSettingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/email/delete';
    }
}
