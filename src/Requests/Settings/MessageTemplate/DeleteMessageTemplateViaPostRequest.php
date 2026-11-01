<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Message Template record by ID: POST /settings/integration/message-template/{id}/delete.
 */
class DeleteMessageTemplateViaPostRequest extends ActionRequest
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
        return '/settings/integration/message-template/'.$this->id.'/delete';
    }
}
