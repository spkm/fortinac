<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Security Rule: POST /policy/security-rule/{id}/enable.
 */
class EnableSecurityRuleRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-rule/'.$this->id.'/enable';
    }
}
