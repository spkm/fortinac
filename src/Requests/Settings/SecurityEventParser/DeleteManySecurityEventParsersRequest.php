<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Security Event Parser records supplied under the id parameter: POST /settings/integration/security-event-parser/delete.
 *
 * Parameters: id.
 */
class DeleteManySecurityEventParsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/delete';
    }
}
