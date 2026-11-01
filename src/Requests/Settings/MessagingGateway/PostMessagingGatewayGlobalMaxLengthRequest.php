<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the maximum length of SMS messages for all providers: POST /settings/integration/messaging-gateway/global/max-length.
 *
 * Parameters: maxLength, Request Body.
 */
class PostMessagingGatewayGlobalMaxLengthRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/global/max-length';
    }
}
