<?php

namespace spkm\FortiNac\Requests\Host\DeviceProfilingRule;

use JsonSerializable;
use spkm\FortiNac\Data\Host\DeviceProfilingRule;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Device Profiling Rule record in the database: POST /host/device-profiling-rule/{id}.
 */
class UpdateDeviceProfilingRuleRequest extends WriteRequest
{
    protected ?string $dto = DeviceProfilingRule::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/device-profiling-rule/'.$this->id;
    }
}
