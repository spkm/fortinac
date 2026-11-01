<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the maximum length of SMS messages for all providers: GET /settings/integration/messaging-gateway/global/max-length.
 */
class GetMessagingGatewayGlobalMaxLengthRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/global/max-length';
    }
}
