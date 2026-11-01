<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Host Record or records supplied, if it is not currently in use: POST /host/{id}/delete.
 */
class DeleteHostViaPostRequest extends ActionRequest
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
        return '/host/'.$this->id.'/delete';
    }
}
