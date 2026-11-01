<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Message Template record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/integration/message-template.
 */
class CreateMessageTemplateRequest extends WriteRequest
{
    protected ?string $dto = MessageTemplate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template';
    }
}
