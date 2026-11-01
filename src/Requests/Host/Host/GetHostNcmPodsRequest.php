<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostNcmPod;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return all Host Records, with User and Adapter information, which match the supplied multifilter string: GET /host/ncm-pods.
 */
class GetHostNcmPodsRequest extends ListRequest
{
    protected ?string $dto = HostNcmPod::class;

    public function resolveEndpoint(): string
    {
        return '/host/ncm-pods';
    }
}
