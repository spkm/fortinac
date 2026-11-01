<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Message Template record by ID: DELETE /settings/integration/message-template/{id}.
 */
class DeleteMessageTemplateRequest extends DeleteRequest
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
        return '/settings/integration/message-template/'.$this->id;
    }
}
