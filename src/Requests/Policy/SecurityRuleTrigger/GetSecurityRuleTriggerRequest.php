<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Data\Policy\SecurityRuleTrigger;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Trigger records matching the supplied filter: GET /policy/security-rule-trigger/{id}.
 */
class GetSecurityRuleTriggerRequest extends ItemRequest
{
    protected ?string $dto = SecurityRuleTrigger::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule-trigger/'.$this->id;
    }
}
