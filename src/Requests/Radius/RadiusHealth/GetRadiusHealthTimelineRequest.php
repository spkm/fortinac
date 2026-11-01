<?php

namespace spkm\FortiNac\Requests\Radius\RadiusHealth;

use spkm\FortiNac\Data\Radius\RadiusHealthTimeline;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns set of RADIUS health snapshots showing RADIUS activity over time: GET /radius/radius-health/timeline.
 */
class GetRadiusHealthTimelineRequest extends ListRequest
{
    protected ?string $dto = RadiusHealthTimeline::class;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-health/timeline';
    }
}
