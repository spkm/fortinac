<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Message gateway record by ID: DELETE /settings/integration/messaging-gateway/{id}.
 */
class DeleteMessagingGatewayRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/'.$this->id;
    }
}
