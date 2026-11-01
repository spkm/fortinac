<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single record by ID: POST /policy/logical-network/{id}/delete.
 */
class DeleteLogicalNetworkViaPostRequest extends ActionRequest
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
        return '/policy/logical-network/'.$this->id.'/delete';
    }
}
