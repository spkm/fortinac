<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Security Rule record by ID: DELETE /policy/security-rule/{id}.
 */
class DeleteSecurityRuleRequest extends DeleteRequest
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
        return '/policy/security-rule/'.$this->id;
    }
}
