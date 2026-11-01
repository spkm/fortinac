<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Data\Settings\FortiGateTelemetry;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Fabric Connection sources matching the supplied filter: GET /settings/security-fabric/{id}.
 */
class GetFortiGateTelemetryRequest extends ItemRequest
{
    protected ?string $dto = FortiGateTelemetry::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/security-fabric/'.$this->id;
    }
}
