<?php

namespace spkm\FortiNac\Resources\Logging;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Logging\EventType;
use spkm\FortiNac\Data\Logging\EventTypeThresholds;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\EventType\CountAllEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\CountEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypeCountByIdRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypesRequest;
use spkm\FortiNac\Requests\Logging\EventType\GetEventTypeThresholdsRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeGroupRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeLoggingStrategyRequest;
use spkm\FortiNac\Requests\Logging\EventType\PostEventTypeThresholdsRequest;

/**
 * Event Types, from FortiNac::logging()->eventTypes().
 *
 * @extends Builder<EventType>
 */
class EventTypeResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EventType::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventTypesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountEventTypesRequest($query);
    }

    /**
     * Returns the count of all Event Type records in the database: GET /logging/event-types/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllEventTypesRequest);
    }

    /**
     * Returns the Event Type record that matches the supplied DBID: GET /logging/event-types/count/{id}.
     */
    public function countById(int $id): ?EventType
    {
        return $this->fetchOrNull(new GetEventTypeCountByIdRequest($id));
    }

    /**
     * Returns the thresholds for several system events, such as CPU usage, before they are triggered: GET /logging/event-types/thresholds.
     */
    public function thresholds(): ?EventTypeThresholds
    {
        return $this->fetchOrNull(new GetEventTypeThresholdsRequest);
    }

    /**
     * Sets the targeted group for one or more event types: POST /logging/event-types/group.
     *
     * @param  array<string, mixed>  $options  Query options: id, groupID
     */
    public function group(array $options = []): bool
    {
        return $this->perform(new PostEventTypeGroupRequest($options));
    }

    /**
     * Sets the logging strategy for one or more event types: POST /logging/event-types/logging-strategy.
     *
     * @param  array<string, mixed>  $options  Query options: id, logLevel
     */
    public function loggingStrategy(array $options = []): bool
    {
        return $this->perform(new PostEventTypeLoggingStrategyRequest($options));
    }

    /**
     * Sets the thresholds for generating system events: POST /logging/event-types/thresholds.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function thresholds2(array|Data $attributes = [], array $options = []): ?EventTypeThresholds
    {
        return $this->fetch(new PostEventTypeThresholdsRequest($this->payloadOf($attributes), $options));
    }
}
