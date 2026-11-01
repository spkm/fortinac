<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\MessagingGateway;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Message gateway record: POST /settings/integration/messaging-gateway/{id}.
 */
class UpdateMessagingGatewayRequest extends WriteRequest
{
    protected ?string $dto = MessagingGateway::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/'.$this->id;
    }
}
