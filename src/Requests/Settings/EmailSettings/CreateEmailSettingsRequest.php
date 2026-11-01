<?php

namespace spkm\FortiNac\Requests\Settings\EmailSettings;

use spkm\FortiNac\Data\Settings\EmailSettings;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Returns the currently configured e-mail server settings: POST /settings/integration/email.
 */
class CreateEmailSettingsRequest extends ActionRequest
{
    protected ?string $dto = EmailSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/email';
    }
}
