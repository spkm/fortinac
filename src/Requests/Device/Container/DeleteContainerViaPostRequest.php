<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Container record supplied, if it is not currently in use: POST /device/container/{id}/delete.
 */
class DeleteContainerViaPostRequest extends ActionRequest
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
        return '/device/container/'.$this->id.'/delete';
    }
}
