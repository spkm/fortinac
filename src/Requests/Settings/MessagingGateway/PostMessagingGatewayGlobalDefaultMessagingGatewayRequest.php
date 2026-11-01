<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the default Message Gateway used to send sms: POST /settings/integration/messaging-gateway/global/default-messaging-gateway.
 *
 * Parameters: defaultMessagingGateway, Request Body.
 */
class PostMessagingGatewayGlobalDefaultMessagingGatewayRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/global/default-messaging-gateway';
    }
}
