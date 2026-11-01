<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single portal policy record by ID: POST /policy/portal/{id}/delete.
 */
class DeletePortalPolicyViaPostRequest extends ActionRequest
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
        return '/policy/portal/'.$this->id.'/delete';
    }
}
