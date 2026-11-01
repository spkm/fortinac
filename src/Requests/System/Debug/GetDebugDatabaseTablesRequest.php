<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a summary of all tables in the database: GET /system/debug/database/tables.
 */
class GetDebugDatabaseTablesRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/debug/database/tables';
    }
}
