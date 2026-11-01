<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentitySource;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Device Identity Source: POST /host/device-identity-source/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapDeviceIdentitySourceRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity-source/rank/swap';
    }
}
