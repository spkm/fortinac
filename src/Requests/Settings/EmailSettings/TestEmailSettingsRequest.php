<?php

namespace spkm\FortiNac\Requests\Settings\EmailSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends a test e-mail to the supplied address, either using the current settings or those supplied in this request: POST /settings/integration/email/test.
 *
 * Parameters: smtpTimeout, smtpConnectionTimeout, emailPassword, emailAuthType, emailPort, emailUsername, emailServer, emailAuth, emailSender, alwaysSendAsSender, email, recipient.
 */
class TestEmailSettingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/email/test';
    }
}
