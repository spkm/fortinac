<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\UserHostProfile;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a User/Host Profile record: POST /policy/user-host-profile/{id}.
 */
class UpdateUserHostProfileRequest extends WriteRequest
{
    protected ?string $dto = UserHostProfile::class;

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
        return '/policy/user-host-profile/'.$this->id;
    }
}
