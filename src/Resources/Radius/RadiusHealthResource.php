<?php

namespace spkm\FortiNac\Resources\Radius;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Radius\RadiusHealth;
use spkm\FortiNac\Data\Radius\RadiusHealthTimeline;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealth2Request;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthLatestRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthSnapshotIntervalRequest;
use spkm\FortiNac\Requests\Radius\RadiusHealth\GetRadiusHealthTimelineRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Radius Health, from FortiNac::radius()->health().
 *
 * @extends BaseResource<RadiusHealth>
 */
class RadiusHealthResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, RadiusHealth::class);
    }

    /**
     * Return all RADIUS health snapshots: GET /radius/radius-health.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RadiusHealth>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusHealthRequest($query));
    }

    /**
     * Return all RADIUS response records: GET /radius/radius-health-details.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RadiusHealth>
     */
    public function get2(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusHealth2Request($query));
    }

    /**
     * Returns set of RADIUS health snapshots showing RADIUS activity over time: GET /radius/radius-health/timeline.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RadiusHealthTimeline>
     */
    public function timeline(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusHealthTimelineRequest($query));
    }

    /**
     * Returns set of RADIUS health snapshots showing latest RADIUS activity over time: GET /radius/radius-health/latest.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, RadiusHealthTimeline>
     */
    public function latest(Query|array $query = []): Collection
    {
        return $this->fetch(new GetRadiusHealthLatestRequest($query));
    }

    /**
     * Returns interval at which RADIUS health snapshots are taken: GET /radius/radius-health/snapshot-interval.
     */
    public function snapshotInterval(): mixed
    {
        return $this->fetch(new GetRadiusHealthSnapshotIntervalRequest);
    }
}
