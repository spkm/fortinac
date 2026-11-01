<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\AccessPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Access Policy record: POST /policy/access/{id}.
 */
class UpdateAccessPolicyRequest extends WriteRequest
{
    protected ?string $dto = AccessPolicy::class;

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
        return '/policy/access/'.$this->id;
    }
}
