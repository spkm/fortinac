<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\HostDeviceType;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all private Client Filters, used multifilter queries. If allowed, shared Client Filters are also included: GET /host/device-types.
 */
class GetHostDeviceTypesRequest extends ListRequest
{
    protected ?string $dto = HostDeviceType::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-types';
    }
}
