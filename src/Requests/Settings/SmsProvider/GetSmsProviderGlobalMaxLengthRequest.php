<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the maximum length of SMS messages for all providers: GET /settings/integration/sms/global/max-length.
 */
class GetSmsProviderGlobalMaxLengthRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/global/max-length';
    }
}
