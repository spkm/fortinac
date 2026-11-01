<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Device Identity Source records matching the supplied filter: GET /host/device-identity-source.
 */
class GetDeviceIdentitySourcesRequest extends ListRequest
{
    protected ?string $dto = DeviceIdentitySource::class;

    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source';
    }
}
