<?php

namespace spkm\FortiNac\Requests\Settings\MessageTemplate;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\MessageTemplate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Message Template record: POST /settings/integration/message-template/{id}.
 */
class UpdateMessageTemplateRequest extends WriteRequest
{
    protected ?string $dto = MessageTemplate::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/message-template/'.$this->id;
    }
}
