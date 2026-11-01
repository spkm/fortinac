<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this SMS Provider record: GET /settings/integration/sms/{id}/usage.
 */
class GetSmsProviderUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/'.$this->id.'/usage';
    }
}
