<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Address record by ID: DELETE /settings/device/network-address/{id}.
 */
class DeleteNetworkAddressRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/device/network-address/'.$this->id;
    }
}
