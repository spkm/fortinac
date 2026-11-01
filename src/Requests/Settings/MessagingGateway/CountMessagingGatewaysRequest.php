<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of messaging gateways matching the supplied filter: GET /settings/integration/messaging-gateway/count.
 */
class CountMessagingGatewaysRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/count';
    }
}
