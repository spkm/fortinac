<?php

namespace spkm\FortiNac\Requests\Policy\EventAction;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\EventAction;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Event Action record: POST /policy/event-action/{id}.
 */
class UpdateEventActionRequest extends WriteRequest
{
    protected ?string $dto = EventAction::class;

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
        return '/policy/event-action/'.$this->id;
    }
}
