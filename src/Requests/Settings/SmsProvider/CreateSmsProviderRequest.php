<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new SMS Provider record to the database: POST /settings/integration/sms.
 */
class CreateSmsProviderRequest extends WriteRequest
{
    protected ?string $dto = SmsProvider::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms';
    }
}
