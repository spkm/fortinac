<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Security Fabric Connection source: GET /settings/security-fabric/{id}/usage.
 */
class GetFortiGateTelemetryUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/security-fabric/'.$this->id.'/usage';
    }
}
