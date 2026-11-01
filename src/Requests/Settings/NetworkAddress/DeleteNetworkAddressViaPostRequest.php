<?php

namespace spkm\FortiNac\Requests\Settings\NetworkAddress;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Address record by ID: POST /settings/device/network-address/{id}/delete.
 */
class DeleteNetworkAddressViaPostRequest extends ActionRequest
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
        return '/settings/device/network-address/'.$this->id.'/delete';
    }
}
