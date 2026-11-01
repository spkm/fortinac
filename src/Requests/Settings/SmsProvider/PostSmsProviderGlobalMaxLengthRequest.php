<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the maximum length of SMS messages for all providers: POST /settings/integration/sms/global/max-length.
 *
 * Parameters: maxLength.
 */
class PostSmsProviderGlobalMaxLengthRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/global/max-length';
    }
}
