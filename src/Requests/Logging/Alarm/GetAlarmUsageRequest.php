<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Alarm record: GET /logging/alarm/{id}/usage.
 */
class GetAlarmUsageRequest extends ListRequest
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
        return '/logging/alarm/'.$this->id.'/usage';
    }
}
