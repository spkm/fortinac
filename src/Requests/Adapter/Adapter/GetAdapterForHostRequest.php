<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of adapters for the host object with the provided id: GET /adapter/for-host.
 */
class GetAdapterForHostRequest extends ListRequest
{
    protected ?string $dto = Adapter::class;

    public function resolveEndpoint(): string
    {
        return '/adapter/for-host';
    }
}
