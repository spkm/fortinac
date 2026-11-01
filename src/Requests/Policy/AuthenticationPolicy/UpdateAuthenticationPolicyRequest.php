<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\AuthenticationPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Authentication Policy record: POST /policy/authentication/{id}.
 */
class UpdateAuthenticationPolicyRequest extends WriteRequest
{
    protected ?string $dto = AuthenticationPolicy::class;

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
        return '/policy/authentication/'.$this->id;
    }
}
