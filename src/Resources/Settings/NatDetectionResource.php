<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\NatDetection;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\NatDetection\GetNatDetectionRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesByIdRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesDeleteRequest;
use spkm\FortiNac\Requests\Settings\NatDetection\PostNatDetectionIpRangesRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Nat Detection, from FortiNac::settings()->natDetection().
 *
 * @extends BaseResource<NatDetection>
 */
class NatDetectionResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, NatDetection::class);
    }

    /**
     * GET /settings/device/NAT-detection: GET /settings/device/NAT-detection.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, NatDetection>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetNatDetectionRequest($query));
    }

    /**
     * POST /settings/device/NAT-detection/ip-ranges: POST /settings/device/NAT-detection/ip-ranges.
     *
     * @param  array<string, mixed>  $options  Query options: startIP, endIP, dbid
     */
    public function ipRanges(array $options = []): bool
    {
        return $this->perform(new PostNatDetectionIpRangesRequest($options));
    }

    /**
     * POST /settings/device/NAT-detection/ip-ranges/delete: POST /settings/device/NAT-detection/ip-ranges/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function ipRangesDelete(array $options = []): bool
    {
        return $this->perform(new PostNatDetectionIpRangesDeleteRequest($options));
    }

    /**
     * POST /settings/device/NAT-detection/ip-ranges/{id}: POST /settings/device/NAT-detection/ip-ranges/{id}.
     *
     * @param  array<string, mixed>  $options  Query options: startIP, endIP, dbid
     */
    public function ipRangesById(int $id, array $options = []): bool
    {
        return $this->perform(new PostNatDetectionIpRangesByIdRequest($id, $options));
    }
}
