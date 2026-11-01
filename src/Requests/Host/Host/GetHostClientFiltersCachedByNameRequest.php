<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostClientFiltersCachedByName;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the cached filter with the supplied name: GET /host/client-filters/cached/{name}.
 */
class GetHostClientFiltersCachedByNameRequest extends ItemRequest
{
    protected ?string $dto = HostClientFiltersCachedByName::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/host/client-filters/cached/'.rawurlencode($this->name);
    }
}
