<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the SMS Provider record supplied, if they are not currently in use: POST /settings/integration/sms/{id}/delete.
 */
class DeleteSmsProviderViaPostRequest extends ActionRequest
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
        return '/settings/integration/sms/'.$this->id.'/delete';
    }
}
