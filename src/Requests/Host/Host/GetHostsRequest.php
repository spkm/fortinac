<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Host Records which match the supplied filter: GET /host.
 */
class GetHostsRequest extends ListRequest
{
    protected ?string $dto = Host::class;

    public function resolveEndpoint(): string
    {
        return '/host';
    }
}
