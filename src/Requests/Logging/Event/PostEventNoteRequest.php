<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the note for one or more events: POST /logging/event/note.
 *
 * Parameters: note, id.
 */
class PostEventNoteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event/note';
    }
}
