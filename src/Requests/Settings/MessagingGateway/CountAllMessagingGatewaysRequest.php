<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all messaging gateways in the database: GET /settings/integration/messaging-gateway/count/all.
 */
class CountAllMessagingGatewaysRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/count/all';
    }
}
