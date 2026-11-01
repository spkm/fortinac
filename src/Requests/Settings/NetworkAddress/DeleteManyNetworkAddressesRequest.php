<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Address records supplied under the id parameter: POST /settings/device/network-address/delete.
 *
 * Parameters: id.
 */
class DeleteManyNetworkAddressesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address/delete';
    }
}
