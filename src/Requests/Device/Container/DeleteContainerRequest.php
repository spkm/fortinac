<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Container record supplied, if it is not currently in use: DELETE /device/container/{id}.
 */
class DeleteContainerRequest extends DeleteRequest
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
        return '/device/container/'.$this->id;
    }
}
