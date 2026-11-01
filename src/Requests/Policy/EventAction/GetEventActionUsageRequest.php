<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Event Action record: GET /policy/event-action/{id}/usage.
 */
class GetEventActionUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/event-action/'.$this->id.'/usage';
    }
}
