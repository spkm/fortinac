<?php

namespace spkm\FortiNac\Requests\Radius\RadiusHealth;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns interval at which RADIUS health snapshots are taken: GET /radius/radius-health/snapshot-interval.
 */
class GetRadiusHealthSnapshotIntervalRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/radius/radius-health/snapshot-interval';
    }
}
