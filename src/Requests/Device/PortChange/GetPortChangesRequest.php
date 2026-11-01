<?php

namespace spkm\FortiNac\Requests\Device\PortChange;

use spkm\FortiNac\Data\Device\PortChange;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Port Change records which match the supplied filter: GET /device/port-changes.
 */
class GetPortChangesRequest extends ListRequest
{
    protected ?string $dto = PortChange::class;

    public function resolveEndpoint(): string
    {
        return '/device/port-changes';
    }
}
