<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Message Template records supplied under the id parameter: POST /settings/integration/message-template/delete.
 *
 * Parameters: id.
 */
class DeleteManyMessageTemplatesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template/delete';
    }
}
