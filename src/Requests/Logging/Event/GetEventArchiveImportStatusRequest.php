<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the status of the most recent event archive import: GET /logging/event/archive/import/status.
 */
class GetEventArchiveImportStatusRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/event/archive/import/status';
    }
}
