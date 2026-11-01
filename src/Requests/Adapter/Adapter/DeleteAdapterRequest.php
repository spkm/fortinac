<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Adapter record supplied, if it is not currently in use. Parameter Id(required), DBID of the adapter record: DELETE /adapter/{id}.
 */
class DeleteAdapterRequest extends DeleteRequest
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
        return '/adapter/'.$this->id;
    }
}
