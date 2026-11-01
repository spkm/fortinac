<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all SMS Provider records which match the supplied filter: GET /settings/integration/sms.
 */
class GetSmsProvidersRequest extends ListRequest
{
    protected ?string $dto = SmsProvider::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms';
    }
}
