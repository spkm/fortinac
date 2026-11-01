<?php

namespace spkm\FortiNac\Requests\Host\ScannedApplication;

use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of records that reference this Scanned Application record: GET /host/scanned-application/{id}/usage.
 */
class GetScannedApplicationUsageRequest extends ListRequest
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
        return '/host/scanned-application/'.$this->id.'/usage';
    }
}
