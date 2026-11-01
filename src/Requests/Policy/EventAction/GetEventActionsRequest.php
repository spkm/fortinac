<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Event Action records matching the supplied filter: GET /policy/event-action.
 */
class GetEventActionsRequest extends ListRequest
{
    protected ?string $dto = EventAction::class;

    public function resolveEndpoint(): string
    {
        return '/policy/event-action';
    }
}
