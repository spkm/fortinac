<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\SupplicantPolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Supplicant Policy record: POST /policy/supplicant/{id}.
 */
class UpdateSupplicantPolicyRequest extends WriteRequest
{
    protected ?string $dto = SupplicantPolicy::class;

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
        return '/policy/supplicant/'.$this->id;
    }
}
