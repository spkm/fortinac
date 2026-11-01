<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the full Fingerprint information, including attributes, for a specified fingerprint: GET /host/device-identity/fingerprints.
 *
 * Parameters: ids.
 */
class GetDeviceIdentityFingerprintsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: ids
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-identity/fingerprints';
    }
}
