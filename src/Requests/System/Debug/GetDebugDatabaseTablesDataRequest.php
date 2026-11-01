<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Queries the table and returns the results of the query as a JSON array: GET /system/debug/database/tables/data.
 */
class GetDebugDatabaseTablesDataRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/database/tables/data';
    }
}
