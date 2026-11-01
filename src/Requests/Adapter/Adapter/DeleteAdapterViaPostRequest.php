<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Adapter record supplied, if it is not currently in use: POST /adapter/{id}/delete.
 */
class DeleteAdapterViaPostRequest extends ActionRequest
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
        return '/adapter/'.$this->id.'/delete';
    }
}
