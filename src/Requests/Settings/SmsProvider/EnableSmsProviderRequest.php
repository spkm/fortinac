<?php

namespace spkm\FortiNac\Requests\Settings\SmsProvider;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied SMS Provider: POST /settings/integration/sms/{id}/enable.
 */
class EnableSmsProviderRequest extends ActionRequest
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
        return '/settings/integration/sms/'.$this->id.'/enable';
    }
}
