<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Admin Profile Mapping records matching the supplied filter: GET /user/admin-profile/mapping/{id}.
 */
class GetAdminProfileMappingByIdRequest extends ListRequest
{
    protected ?string $dto = AdminProfileMapping::class;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected int $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/'.$this->id;
    }
}
