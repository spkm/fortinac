<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Data\System\DebugDatabaseRelation;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Queries the relations table, a polymorphic associative table between various other tables: GET /system/debug/database/relations.
 */
class GetDebugDatabaseRelationsRequest extends ListRequest
{
    protected ?string $dto = DebugDatabaseRelation::class;

    public function resolveEndpoint(): string
    {
        return '/system/debug/database/relations';
    }
}
