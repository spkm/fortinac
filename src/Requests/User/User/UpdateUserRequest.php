<?php

namespace spkm\FortiNac\Requests\User\User;

use JsonSerializable;
use spkm\FortiNac\Data\User\User;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new user record to the database: POST /user/{id}.
 */
class UpdateUserRequest extends WriteRequest
{
    protected ?string $dto = User::class;

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
        return '/user/'.$this->id;
    }
}
