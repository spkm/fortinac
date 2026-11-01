<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddressGroup;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Address records supplied under the id parameter: POST /settings/device/network-address-group/delete.
 *
 * Parameters: id.
 */
class DeleteManyNetworkAddressGroupsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address-group/delete';
    }
}
