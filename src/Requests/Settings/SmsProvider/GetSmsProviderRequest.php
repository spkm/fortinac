<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the SMS Provider record with the supplied DBID: GET /settings/integration/sms/{id}.
 */
class GetSmsProviderRequest extends ItemRequest
{
    protected ?string $dto = SmsProvider::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/'.$this->id;
    }
}
