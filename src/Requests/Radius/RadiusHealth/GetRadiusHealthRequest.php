<?php

namespace spkm\FortiNac\Requests\Radius\RadiusHealth;

use spkm\FortiNac\Data\Radius\RadiusHealth;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return all RADIUS health snapshots: GET /radius/radius-health.
 */
class GetRadiusHealthRequest extends ListRequest
{
    protected ?string $dto = RadiusHealth::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-health';
    }
}
