<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Data\Settings\MessagingGateway;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Message Gateway records matching the supplied filter: GET /settings/integration/messaging-gateway.
 */
class GetMessagingGatewaysRequest extends ListRequest
{
    protected ?string $dto = MessagingGateway::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway';
    }
}
