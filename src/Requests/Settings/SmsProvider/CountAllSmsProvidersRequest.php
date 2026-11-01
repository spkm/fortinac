<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all SMS Provider records in the database: GET /settings/integration/sms/count/all.
 */
class CountAllSmsProvidersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/count/all';
    }
}
