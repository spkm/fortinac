<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of adapters connected to the ports provided: GET /adapter/connected-to-ports.
 */
class GetAdapterConnectedToPortsRequest extends ListRequest
{
    protected ?string $dto = Adapter::class;

    public function resolveEndpoint(): string
    {
        return '/adapter/connected-to-ports';
    }
}
