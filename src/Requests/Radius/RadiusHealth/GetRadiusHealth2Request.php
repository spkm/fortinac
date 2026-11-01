<?php

namespace spkm\FortiNac\Requests\Radius\RadiusHealth;

use spkm\FortiNac\Data\Radius\RadiusHealth;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Return all RADIUS response records: GET /radius/radius-health-details.
 */
class GetRadiusHealth2Request extends ListRequest
{
    protected ?string $dto = RadiusHealth::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-health-details';
    }
}
