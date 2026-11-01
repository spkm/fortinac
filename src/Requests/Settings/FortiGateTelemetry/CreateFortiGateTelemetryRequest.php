<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a Security Fabric Connection source, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/security-fabric.
 */
class CreateFortiGateTelemetryRequest extends WriteRequest
{
    protected ?string $dto = FortiGateTelemetry::class;

    public function resolveEndpoint(): string
    {
        return '/settings/security-fabric';
    }
}
