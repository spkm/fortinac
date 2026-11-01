<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use JsonSerializable;
use spkm\FortiNac\Data\User\AdminProfileMapping;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Admin Profile Mapping record: POST /user/admin-profile/mapping/{id}.
 */
class PostAdminProfileMappingByIdRequest extends WriteRequest
{
    protected ?string $dto = AdminProfileMapping::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/admin-profile/mapping/'.$this->id;
    }
}
