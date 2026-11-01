<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Messaging Gateway: POST /settings/integration/messaging-gateway/{id}/enable.
 */
class EnableMessagingGatewayRequest extends ActionRequest
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
        return '/settings/integration/messaging-gateway/'.$this->id.'/enable';
    }
}
