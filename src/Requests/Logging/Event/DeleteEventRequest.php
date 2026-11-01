<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the event record that matches the supplied DBID, if it is not currently in use: DELETE /logging/event/{id}.
 */
class DeleteEventRequest extends DeleteRequest
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
        return '/logging/event/'.$this->id;
    }
}
