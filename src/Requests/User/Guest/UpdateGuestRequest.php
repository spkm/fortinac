<?php

namespace spkm\FortiNac\Requests\User\Guest;

use JsonSerializable;
use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing guest account record in the database: POST /user/guest/{id}.
 */
class UpdateGuestRequest extends WriteRequest
{
    protected ?string $dto = Guest::class;

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
        return '/user/guest/'.$this->id;
    }
}
