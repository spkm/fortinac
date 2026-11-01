<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this User Dashboard record: GET /user/dashboard/{id}/usage.
 */
class GetDashboardUsageRequest extends ListRequest
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
        return '/user/dashboard/'.$this->id.'/usage';
    }
}
