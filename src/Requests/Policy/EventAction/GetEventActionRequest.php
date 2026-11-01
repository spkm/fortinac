<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Event Action records matching the supplied filter: GET /policy/event-action/{id}.
 */
class GetEventActionRequest extends ItemRequest
{
    protected ?string $dto = EventAction::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/event-action/'.$this->id;
    }
}
