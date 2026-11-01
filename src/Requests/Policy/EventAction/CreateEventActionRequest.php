<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Event Action record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/event-action.
 */
class CreateEventActionRequest extends WriteRequest
{
    protected ?string $dto = EventAction::class;

    public function resolveEndpoint(): string
    {
        return '/policy/event-action';
    }
}
