<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Lists the enforcement status of all ports which match the supplied set of filters: GET /device/port/enforcement.
 */
class GetPortEnforcementRequest extends ListRequest
{
    protected ?string $dto = Port::class;

    public function resolveEndpoint(): string
    {
        return '/device/port/enforcement';
    }
}
