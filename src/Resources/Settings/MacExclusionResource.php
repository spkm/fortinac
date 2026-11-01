<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\MacExclusion;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\MacExclusion\CreateMacExclusionRequest;
use spkm\FortiNac\Requests\Settings\MacExclusion\DeleteManyMacExclusionsRequest;
use spkm\FortiNac\Requests\Settings\MacExclusion\GetMacExclusionsRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Mac Exclusion, from FortiNac::settings()->macExclusions().
 *
 * @extends BaseResource<MacExclusion>
 */
class MacExclusionResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, MacExclusion::class);
    }

    /**
     * Returns the currently configured Mac Exclusion Ranges: GET /settings/device/mac-exclusion.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, MacExclusion>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetMacExclusionsRequest($query));
    }

    /**
     * Deletes a Mac Exclusion range: POST /settings/device/mac-exclusion/delete.
     *
     * @param  array<string, mixed>  $options  Query options: dbid
     */
    public function deleteMany(array $options = []): bool
    {
        return $this->perform(new DeleteManyMacExclusionsRequest($options));
    }

    /**
     * Adds a Mac Exclusion range: POST /settings/device/mac-exclusion.
     *
     * @param  array<string, mixed>  $options  Query options: startMac, endMac, dbid
     */
    public function create(array $options = []): ?MacExclusion
    {
        return $this->fetch(new CreateMacExclusionRequest($options));
    }
}
