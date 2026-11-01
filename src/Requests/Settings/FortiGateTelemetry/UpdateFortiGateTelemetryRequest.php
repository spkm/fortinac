<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a Security Fabric Connection source: POST /settings/security-fabric/{id}.
 */
class UpdateFortiGateTelemetryRequest extends WriteRequest
{
    protected ?string $dto = FortiGateTelemetry::class;

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
        return '/settings/security-fabric/'.$this->id;
    }
}
