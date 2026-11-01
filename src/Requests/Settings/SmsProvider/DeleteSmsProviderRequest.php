<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the SMS Provider record supplied, if it is not currently in use: DELETE /settings/integration/sms/{id}.
 */
class DeleteSmsProviderRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/sms/'.$this->id;
    }
}
