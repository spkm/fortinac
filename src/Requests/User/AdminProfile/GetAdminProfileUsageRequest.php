<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Admin Profile record by ID: GET /user/admin-profile/{id}/usage.
 */
class GetAdminProfileUsageRequest extends ListRequest
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
        return '/user/admin-profile/'.$this->id.'/usage';
    }
}
