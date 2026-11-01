<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * When modifying multiple ports at once, lists the number of devices that do and do not allow port management settings: GET /device/port/feature/port-management.
 *
 * Parameters: devID, Request Body.
 */
class GetPortFeaturePortManagementRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: devID, Request Body
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/device/port/feature/port-management';
    }
}
