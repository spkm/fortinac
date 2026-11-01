<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the default Message Gateway used to send sms: GET /settings/integration/messaging-gateway/global/default-messaging-gateway.
 */
class GetMessagingGatewayGlobalDefaultMessagingGatewayRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/global/default-messaging-gateway';
    }
}
