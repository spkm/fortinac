<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Supplicant Policy: POST /policy/supplicant/{id}/enable.
 */
class EnableSupplicantPolicyRequest extends ActionRequest
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
        return '/policy/supplicant/'.$this->id.'/enable';
    }
}
