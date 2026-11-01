<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this event record: GET /logging/event/{id}/usage.
 */
class GetEventUsageRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected int $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/logging/event/'.$this->id.'/usage';
    }
}
