<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Network Device record supplied, if it is not currently in use: DELETE /device/{id}.
 */
class DeleteNetworkDeviceRequest extends DeleteRequest
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
        return '/device/'.$this->id;
    }
}
