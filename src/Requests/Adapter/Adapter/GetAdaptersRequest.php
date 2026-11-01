<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Data\Adapter\Adapter;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Adapter records which match the supplied filter: GET /adapter.
 */
class GetAdaptersRequest extends ListRequest
{
    protected ?string $dto = Adapter::class;

    public function resolveEndpoint(): string
    {
        return '/adapter';
    }
}
