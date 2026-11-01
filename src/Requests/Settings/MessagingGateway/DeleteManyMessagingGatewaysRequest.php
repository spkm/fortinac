<?php

namespace spkm\FortiNac\Requests\Settings\MessagingGateway;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Messaging Gateway records supplied under the id parameter: POST /settings/integration/messaging-gateway/delete.
 *
 * Parameters: id.
 */
class DeleteManyMessagingGatewaysRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/messaging-gateway/delete';
    }
}
