<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Security Rule record: POST /policy/security-rule/{id}.
 */
class UpdateSecurityRuleRequest extends WriteRequest
{
    protected ?string $dto = SecurityRule::class;

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
        return '/policy/security-rule/'.$this->id;
    }
}
