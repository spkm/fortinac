<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Fabric Connection sources matching the supplied filter: GET /settings/security-fabric.
 */
class GetFortiGateTelemetriesRequest extends ListRequest
{
    protected ?string $dto = FortiGateTelemetry::class;

    public function resolveEndpoint(): string
    {
        return '/settings/security-fabric';
    }
}
