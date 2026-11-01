<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Data\Policy\SecurityRule;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Rule records matching the supplied filter: GET /policy/security-rule/{id}.
 */
class GetSecurityRuleRequest extends ItemRequest
{
    protected ?string $dto = SecurityRule::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule/'.$this->id;
    }
}
