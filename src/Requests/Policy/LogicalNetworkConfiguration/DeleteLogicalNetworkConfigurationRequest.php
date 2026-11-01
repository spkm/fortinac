<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single logical network record by ID: DELETE /policy/logical-network-configuration/{id}.
 */
class DeleteLogicalNetworkConfigurationRequest extends DeleteRequest
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
        return '/policy/logical-network-configuration/'.$this->id;
    }
}
