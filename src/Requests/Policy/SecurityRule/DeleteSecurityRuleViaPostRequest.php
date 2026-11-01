<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Security Rule record by ID: POST /policy/security-rule/{id}/delete.
 */
class DeleteSecurityRuleViaPostRequest extends ActionRequest
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
        return '/policy/security-rule/'.$this->id.'/delete';
    }
}
