<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Message Template records matching the supplied filter: GET /settings/integration/message-template/{id}.
 */
class GetMessageTemplateRequest extends ItemRequest
{
    protected ?string $dto = MessageTemplate::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template/'.$this->id;
    }
}
