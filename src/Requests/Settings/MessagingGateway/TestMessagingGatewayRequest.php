<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Test the gateway connection with the third party: POST /settings/integration/messaging-gateway/{id}/test.
 *
 * Parameters: userId.
 */
class TestMessagingGatewayRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: userId
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/'.$this->id.'/test';
    }
}
