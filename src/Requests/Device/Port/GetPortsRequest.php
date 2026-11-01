<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Port Records matching the supplied filter: GET /device/port.
 */
class GetPortsRequest extends ListRequest
{
    protected ?string $dto = Port::class;

    public function resolveEndpoint(): string
    {
        return '/device/port';
    }
}
