<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the event record that matches the supplied DBID, if it is not currently in use: POST /logging/event/{id}/delete.
 */
class DeleteEventViaPostRequest extends ActionRequest
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
        return '/logging/event/'.$this->id.'/delete';
    }
}
