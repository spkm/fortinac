<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Authentication Policy: POST /policy/authentication/{id}/disable.
 */
class DisableAuthenticationPolicyRequest extends ActionRequest
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
        return '/policy/authentication/'.$this->id.'/disable';
    }
}
