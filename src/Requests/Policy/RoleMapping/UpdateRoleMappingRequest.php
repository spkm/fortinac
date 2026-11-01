<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an role mapping record: POST /policy/role-mapping/{id}.
 */
class UpdateRoleMappingRequest extends WriteRequest
{
    protected ?string $dto = RoleMapping::class;

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
        return '/policy/role-mapping/'.$this->id;
    }
}
