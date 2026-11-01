<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Host Record with the supplied DBID. If it is not currently in use: DELETE /host/{id}.
 */
class DeleteHostRequest extends DeleteRequest
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
        return '/host/'.$this->id;
    }
}
