<?php

namespace spkm\FortiNac\Requests\Settings\NatDetection;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * POST /settings/device/NAT-detection/ip-ranges/{id}: POST /settings/device/NAT-detection/ip-ranges/{id}.
 *
 * Parameters: startIP, endIP, dbid.
 */
class PostNatDetectionIpRangesByIdRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: startIP, endIP, dbid
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/device/NAT-detection/ip-ranges/'.$this->id;
    }
}
