<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetwork;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single record by ID: DELETE /policy/logical-network/{id}.
 */
class DeleteLogicalNetworkRequest extends DeleteRequest
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
        return '/policy/logical-network/'.$this->id;
    }
}
