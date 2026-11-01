<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostMultifilter;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Host Records, with User and Adapter information, which match the supplied multifilter string: GET /host/multifilter.
 */
class GetHostMultifilterRequest extends ListRequest
{
    protected ?string $dto = HostMultifilter::class;

    public function resolveEndpoint(): string
    {
        return '/host/multifilter';
    }
}
