<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Access Policy: POST /policy/access/{id}/disable.
 */
class DisableAccessPolicyRequest extends ActionRequest
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
        return '/policy/access/'.$this->id.'/disable';
    }
}
