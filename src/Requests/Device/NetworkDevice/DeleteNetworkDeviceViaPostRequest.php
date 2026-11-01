<?php

namespace spkm\FortiNac\Requests\Device\NetworkDevice;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Network Device record or records supplied, if it is not currently in use: POST /device/{id}/delete.
 */
class DeleteNetworkDeviceViaPostRequest extends ActionRequest
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
        return '/device/'.$this->id.'/delete';
    }
}
