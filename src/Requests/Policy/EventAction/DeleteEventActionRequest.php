<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Event Action record by ID: DELETE /policy/event-action/{id}.
 */
class DeleteEventActionRequest extends DeleteRequest
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
        return '/policy/event-action/'.$this->id;
    }
}
