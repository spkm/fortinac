<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\PatchManagement;
use spkm\FortiNac\Data\Settings\PatchManagementBigFix;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Settings\PatchManagement\GetPatchManagementRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementBigFixRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPatchLinkByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPropertiesBigFixByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\PostPatchManagementPropertiesPatchLinkByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\TestPatchManagementByIdRequest;
use spkm\FortiNac\Requests\Settings\PatchManagement\TestPatchManagementRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Patch Management, from FortiNac::settings()->patchManagement().
 *
 * @extends BaseResource<PatchManagement>
 */
class PatchManagementResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PatchManagement::class);
    }

    /**
     * Returns all patch management server records: GET /settings/integration/patch-management.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, PatchManagement>
     */
    public function get(Query|array $query = []): Collection
    {
        return $this->fetch(new GetPatchManagementRequest($query));
    }

    /**
     * Adds a new BigFix Patch Management server: POST /settings/integration/patch-management/big-fix.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function bigFix(array|Data $attributes = [], array $options = []): ?PatchManagementBigFix
    {
        return $this->fetch(new PostPatchManagementBigFixRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Adds a new PatchLink Patch Management server: POST /settings/integration/patch-management/patch-link/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function patchLinkById(int $id, array|Data $attributes = [], array $options = []): ?PatchManagement
    {
        return $this->fetch(new PostPatchManagementPatchLinkByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Set BigFix server properties: POST /settings/integration/patch-management/properties/big-fix/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function propertiesBigFixById(int $id, array $options = []): bool
    {
        return $this->perform(new PostPatchManagementPropertiesBigFixByIdRequest($id, $options));
    }

    /**
     * Set PatchLink server properties: POST /settings/integration/patch-management/properties/patch-link/{id}.
     *
     * @param  array<string, mixed>  $options  Query options: pollingInterval
     */
    public function propertiesPatchLinkById(int $id, array $options = []): bool
    {
        return $this->perform(new PostPatchManagementPropertiesPatchLinkByIdRequest($id, $options));
    }

    /**
     * Test BigFix Server connection: POST /settings/integration/patch-management/test.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function test(array|Data $attributes = [], array $options = []): ?PatchManagementBigFix
    {
        return $this->fetch(new TestPatchManagementRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Test BigFix Server connection: POST /settings/integration/patch-management/test/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function testById(int $id, array $options = []): bool
    {
        return $this->perform(new TestPatchManagementByIdRequest($id, $options));
    }
}
