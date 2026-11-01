<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the full Fingerprint information, including attributes, for a specified fingerprint: GET /host/device-identity/fingerprint/{id}.
 *
 * Parameters: id.
 */
class GetDeviceIdentityFingerprintByIdRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-identity/fingerprint/'.$this->id;
    }
}
