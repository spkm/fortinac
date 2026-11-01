<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Device Identity Source, shifting other ranks as necessary: POST /host/device-identity-source/rank/set.
 *
 * Parameters: id, rank.
 */
class SetDeviceIdentitySourceRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source/rank/set';
    }
}
