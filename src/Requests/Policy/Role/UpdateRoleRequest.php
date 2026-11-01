<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\Role;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an role record: POST /policy/role/{id}.
 */
class UpdateRoleRequest extends WriteRequest
{
    protected ?string $dto = Role::class;

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
        return '/policy/role/'.$this->id;
    }
}
