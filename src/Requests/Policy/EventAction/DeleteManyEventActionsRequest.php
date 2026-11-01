<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Event Action records supplied under the id parameter: POST /policy/event-action/delete.
 *
 * Parameters: id.
 */
class DeleteManyEventActionsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/event-action/delete';
    }
}
