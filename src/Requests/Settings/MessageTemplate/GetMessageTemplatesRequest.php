<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Message Template records matching the supplied filter: GET /settings/integration/message-template.
 */
class GetMessageTemplatesRequest extends ListRequest
{
    protected ?string $dto = MessageTemplate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template';
    }
}
