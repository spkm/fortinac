<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied SMS Provider: POST /settings/integration/sms/{id}/disable.
 */
class DisableSmsProviderRequest extends ActionRequest
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
        return '/settings/integration/sms/'.$this->id.'/disable';
    }
}
