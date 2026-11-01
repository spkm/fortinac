<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Returns a list of Device Profiling Rule records that reference this record: POST /host/device-profiling-rule/{id}/usage.
 */
class PostDeviceProfilingRuleUsageRequest extends ActionRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/'.$this->id.'/usage';
    }
}
