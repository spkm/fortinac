<?php

namespace spkm\FortiNac\Requests\Host\Aging;

use spkm\FortiNac\Data\Host\Aging;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured Host Aging Settings: GET /host/aging.
 */
class GetAgingRequest extends ItemRequest
{
    protected ?string $dto = Aging::class;

    public function resolveEndpoint(): string
    {
        return '/host/aging';
    }
}
