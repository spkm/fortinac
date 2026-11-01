<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\SmsProvider;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing SMS Provider record in the database: POST /settings/integration/sms/{id}.
 */
class UpdateSmsProviderRequest extends WriteRequest
{
    protected ?string $dto = SmsProvider::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/'.$this->id;
    }
}
