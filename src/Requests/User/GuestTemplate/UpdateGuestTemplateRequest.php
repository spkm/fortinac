<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use JsonSerializable;
use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing guest template record in the database: POST /user/guest-template/{id}.
 */
class UpdateGuestTemplateRequest extends WriteRequest
{
    protected ?string $dto = GuestTemplate::class;

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
        return '/user/guest-template/'.$this->id;
    }
}
