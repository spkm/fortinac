<?php

namespace spkm\FortiNac\Requests\Policy\LogicalNetworkConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single logical network record by ID: POST /policy/logical-network-configuration/{id}/delete.
 */
class DeleteLogicalNetworkConfigurationViaPostRequest extends ActionRequest
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
        return '/policy/logical-network-configuration/'.$this->id.'/delete';
    }
}
