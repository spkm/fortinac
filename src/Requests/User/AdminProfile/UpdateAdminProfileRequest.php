<?php

namespace spkm\FortiNac\Requests\User\AdminProfile;

use JsonSerializable;
use spkm\FortiNac\Data\User\AdminProfile;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Admin Profile record with the supplied ID and values: POST /user/admin-profile/{id}.
 */
class UpdateAdminProfileRequest extends WriteRequest
{
    protected ?string $dto = AdminProfile::class;

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
        return '/user/admin-profile/'.$this->id;
    }
}
