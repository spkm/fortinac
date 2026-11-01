<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostClientFiltersCachedByName;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all private Client Filters, used for multi-filter queries. If allowed, shared Client Filters are also included: GET /host/client-filters.
 */
class GetHostClientFiltersRequest extends ListRequest
{
    protected ?string $dto = HostClientFiltersCachedByName::class;

    public function resolveEndpoint(): string
    {
        return '/host/client-filters';
    }
}
