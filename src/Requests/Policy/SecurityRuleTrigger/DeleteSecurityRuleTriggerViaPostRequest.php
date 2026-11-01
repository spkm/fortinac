<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Security Trigger record by ID: POST /policy/security-rule-trigger/{id}/delete.
 */
class DeleteSecurityRuleTriggerViaPostRequest extends ActionRequest
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
        return '/policy/security-rule-trigger/'.$this->id.'/delete';
    }
}
