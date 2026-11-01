<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Messaging Gateway record by ID: POST /settings/integration/messaging-gateway/{id}/delete.
 */
class DeleteMessagingGatewayViaPostRequest extends ActionRequest
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
        return '/settings/integration/messaging-gateway/'.$this->id.'/delete';
    }
}
