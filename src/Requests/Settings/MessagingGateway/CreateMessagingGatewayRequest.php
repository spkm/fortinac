<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Messaging gateway, updating instead if the supplied messaging gateway has a DBID of one that already exists: POST /settings/integration/messaging-gateway.
 */
class CreateMessagingGatewayRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway';
    }
}
