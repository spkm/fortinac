<?php

namespace spkm\FortiNac\Resources\Logging;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Logging\Event;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\Event\CountAllEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\CountEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\CreateEventRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteEventRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteEventViaPostRequest;
use spkm\FortiNac\Requests\Logging\Event\DeleteManyEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventArchiveRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventsRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\Event\GetEventUsageRequest;
use spkm\FortiNac\Requests\Logging\Event\PostEventArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Event\PostEventNoteRequest;
use spkm\FortiNac\Requests\Logging\Event\StartEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\StopEventMonitorRequest;
use spkm\FortiNac\Requests\Logging\Event\UpdateEventRequest;

/**
 * Event, from FortiNac::logging()->events().
 *
 * @extends Builder<Event>
 */
class EventResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Event::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountEventsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetEventRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateEventRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateEventRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteEventRequest((int) $id, $options);
    }

    /**
     * Returns the event archives currently stored on the filesystem: GET /logging/event/archive.
     */
    public function archive(): mixed
    {
        return $this->fetch(new GetEventArchiveRequest);
    }

    /**
     * Returns the status of the most recent event archive import: GET /logging/event/archive/import/status.
     */
    public function archiveImportStatus(): mixed
    {
        return $this->fetch(new GetEventArchiveImportStatusRequest);
    }

    /**
     * Returns a count of all event records that match the provided filter: GET /logging/event/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllEventsRequest);
    }

    /**
     * Returns a list of records that reference this event record: GET /logging/event/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetEventUsageRequest($id, $query));
    }

    /**
     * Gets all changes to event records since the Events were last polled: GET /logging/event/monitor/{id}.
     */
    public function monitor(int $id): bool
    {
        return $this->perform(new GetEventMonitorRequest($id));
    }

    /**
     * Returns a list of all supported event types: GET /logging/event/supporting-info.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function supportingInfo(Query|array $query = []): Collection
    {
        return $this->fetch(new GetEventSupportingInfoRequest($query));
    }

    /**
     * Imports an event archive from filesystem back into the database: POST /logging/event/archive/import.
     *
     * @param  array<string, mixed>  $options  Query options: fileName
     */
    public function archiveImport(array $options = []): bool
    {
        return $this->perform(new PostEventArchiveImportRequest($options));
    }

    /**
     * Deletes the event record or records that match the supplied DBID(s), if they are not currently in use: POST /logging/event/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyEventsRequest(['id' => $ids]));
    }

    /**
     * Deletes the event record that matches the supplied DBID, if it is not currently in use: POST /logging/event/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteEventViaPostRequest($id, $options));
    }

    /**
     * Begins collecting changes made to event records matching the supplied filter: POST /logging/event/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, Event>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartEventMonitorRequest($options));
    }

    /**
     * Stops collecting changes made to event records for the specified monitor: POST /logging/event/monitor/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopMonitor(int $id, array $options = []): bool
    {
        return $this->perform(new StopEventMonitorRequest($id, $options));
    }

    /**
     * Sets the note for one or more events: POST /logging/event/note.
     *
     * @param  array<string, mixed>  $options  Query options: note, id
     */
    public function note(array $options = []): bool
    {
        return $this->perform(new PostEventNoteRequest($options));
    }
}
