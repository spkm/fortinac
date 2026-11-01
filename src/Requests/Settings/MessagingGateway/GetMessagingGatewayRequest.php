<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Data\Settings\MessagingGateway;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Message Gateway records matching the supplied filter: GET /settings/integration/messaging-gateway/{id}.
 */
class GetMessagingGatewayRequest extends ItemRequest
{
    protected ?string $dto = MessagingGateway::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/'.$this->id;
    }
}
