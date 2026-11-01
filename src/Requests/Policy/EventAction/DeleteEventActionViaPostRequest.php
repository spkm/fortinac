<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Event Action record by ID: POST /policy/event-action/{id}/delete.
 */
class DeleteEventActionViaPostRequest extends ActionRequest
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
        return '/policy/event-action/'.$this->id.'/delete';
    }
}
