<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Security Trigger record by ID: DELETE /policy/security-rule-trigger/{id}.
 */
class DeleteSecurityRuleTriggerRequest extends DeleteRequest
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
        return '/policy/security-rule-trigger/'.$this->id;
    }
}
