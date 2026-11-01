<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of SMS Provider records matching the supplied filter: GET /settings/integration/sms/count.
 */
class CountSmsProvidersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/count';
    }
}
