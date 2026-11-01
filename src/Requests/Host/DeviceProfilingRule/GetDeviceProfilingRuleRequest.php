<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all Device Profiling Rule records with the supplied DBID: GET /host/device-profiling-rule/{id}.
 */
class GetDeviceProfilingRuleRequest extends ItemRequest
{
    protected ?string $dto = DeviceProfilingRule::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/'.$this->id;
    }
}
