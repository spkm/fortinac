<?php

namespace spkm\FortiNac\Resources\Logging;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Logging\EventAlarmMapping;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CountAllEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CountEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\CreateEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteEventAlarmMappingViaPostRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DeleteManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\DisableManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\EnableManyEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingsRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\GetEventAlarmMappingUsageRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\ModifyEventAlarmMappingRequest;
use spkm\FortiNac\Requests\Logging\EventAlarmMapping\UpdateEventAlarmMappingRequest;

/**
 * Event To Alarm Mapping, from FortiNac::logging()->eventAlarmMappings().
 *
 * @extends Builder<EventAlarmMapping>
 */
class EventAlarmMappingResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, EventAlarmMapping::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventAlarmMappingsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountEventAlarmMappingsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEventAlarmMappingRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEventAlarmMappingRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEventAlarmMappingRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEventAlarmMappingRequest((int) $id, $options);
    }

    /**
     * Returns the count of all event to alarm mapping records in the database: GET /logging/event-alarm-mapping/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllEventAlarmMappingsRequest);
    }

    /**
     * Returns a list of records that reference this event to alarm mapping record: GET /logging/event-alarm-mapping/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetEventAlarmMappingUsageRequest($id, $query));
    }

    /**
     * Returns information needed to create an Event to Alarm mapping, such as the list of possible events: GET /logging/event-alarm-mapping/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetEventAlarmMappingSupportingInfoRequest);
    }

    /**
     * Deletes the event to alarm mapping record or records matching the supplied id(s), if they are none are currently in use: POST /logging/event-alarm-mapping/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEventAlarmMappingsRequest(['id' => $ids]));
    }

    /**
     * Disables the supplied event to alarm mapping: POST /logging/event-alarm-mapping/disable.
     *
     * @param  list<int|string>  $ids
     */
    public function disableMany(array $ids): bool
    {
        return $this->perform(new DisableManyEventAlarmMappingsRequest(['id' => $ids]));
    }

    /**
     * Enables the supplied event to alarm mapping: POST /logging/event-alarm-mapping/enable.
     *
     * @param  list<int|string>  $ids
     */
    public function enableMany(array $ids): bool
    {
        return $this->perform(new EnableManyEventAlarmMappingsRequest(['id' => $ids]));
    }

    /**
     * Deletes the event to alarm mapping record that matches the supplied id, if it is not currently in use: POST /logging/event-alarm-mapping/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEventAlarmMappingViaPostRequest($id, $options));
    }

    /**
     * Sets common configuration values for several Event to Alarm Mappings in a single request: POST /logging/event-alarm-mapping/modify.
     *
     * @param  array<string, mixed>  $options  Query options: severity, notifyGroupID, notifyByEmail, notifyBySMS, ids
     */
    public function modify(array $options = []): bool
    {
        return $this->perform(new ModifyEventAlarmMappingRequest($options));
    }
}
