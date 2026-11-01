<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\SecurityRuleTrigger;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates a Security Trigger record: POST /policy/security-rule-trigger/{id}.
 */
class UpdateSecurityRuleTriggerRequest extends WriteRequest
{
    protected ?string $dto = SecurityRuleTrigger::class;

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
        return '/policy/security-rule-trigger/'.$this->id;
    }
}
