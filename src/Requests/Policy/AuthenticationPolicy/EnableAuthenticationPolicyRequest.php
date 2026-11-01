<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Authentication Policy: POST /policy/authentication/{id}/enable.
 */
class EnableAuthenticationPolicyRequest extends ActionRequest
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
        return '/policy/authentication/'.$this->id.'/enable';
    }
}
