<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use JsonSerializable;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing event to alarm mapping record in the database: POST /logging/event-alarm-mapping/{id}.
 */
class UpdateEventAlarmMappingRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

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
        return '/logging/event-alarm-mapping/'.$this->id;
    }
}
