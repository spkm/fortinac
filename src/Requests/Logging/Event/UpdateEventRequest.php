<?php

namespace spkm\FortiNac\Requests\Logging\Event;

use JsonSerializable;
use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing event record in the database: POST /logging/event/{id}.
 */
class UpdateEventRequest extends WriteRequest
{
    protected ?string $dto = Event::class;

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
        return '/logging/event/'.$this->id;
    }
}
