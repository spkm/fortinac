<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the potential contents of a new Device Profiling Rule created from an existing adapter. This is not automatically added to the database: GET /host/device-profiling-rule/create-from-adapter.
 *
 * Parameters: macAddress.
 */
class GetDeviceProfilingRuleCreateFromAdapterRequest extends ItemRequest
{
    protected ?string $dto = DeviceProfilingRule::class;

    /**
     * @param  array<string, mixed>  $options  Query options: macAddress
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/create-from-adapter';
    }
}
