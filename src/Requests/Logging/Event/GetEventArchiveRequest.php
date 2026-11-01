<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the event archives currently stored on the filesystem: GET /logging/event/archive.
 */
class GetEventArchiveRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/logging/event/archive';
    }
}
