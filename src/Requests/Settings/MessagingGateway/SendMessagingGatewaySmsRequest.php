<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sends SMS: POST /settings/integration/messaging-gateway/send-sms.
 */
class SendMessagingGatewaySmsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/send-sms';
    }
}
