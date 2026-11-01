<?php

namespace spkm\FortiNac\Resources\Logging;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Logging\Alarm;
use spkm\FortiNac\Data\Logging\AlarmStartAlarmMonitor;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Logging\Alarm\AcknowledgeAlarm2Request;
use spkm\FortiNac\Requests\Logging\Alarm\AcknowledgeAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\CountAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\CountAllAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteAlarmViaPostRequest;
use spkm\FortiNac\Requests\Logging\Alarm\DeleteManyAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmArchiveImportStatusRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmArchiveRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmMonitorRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmsRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmSupportingInfoRequest;
use spkm\FortiNac\Requests\Logging\Alarm\GetAlarmUsageRequest;
use spkm\FortiNac\Requests\Logging\Alarm\PostAlarmArchiveImportRequest;
use spkm\FortiNac\Requests\Logging\Alarm\StartAlarmMonitorRequest;
use spkm\FortiNac\Requests\Logging\Alarm\StopAlarmMonitorRequest;

/**
 * Alarm, from FortiNac::logging()->alarms().
 *
 * @extends Builder<Alarm>
 */
class AlarmResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Alarm::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAlarmsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountAlarmsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAlarmRequest((int) $id);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAlarmRequest((int) $id, $options);
    }

    /**
     * Return the count of all Alarm records in the database: GET /logging/alarm/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllAlarmsRequest);
    }

    /**
     * Returns the names of all alarm archives currently on the system: GET /logging/alarm/archive.
     */
    public function archive(): mixed
    {
        return $this->fetch(new GetAlarmArchiveRequest);
    }

    /**
     * Returns the status of the most recent alarm archive import: GET /logging/alarm/archive/import/status.
     */
    public function archiveImportStatus(): mixed
    {
        return $this->fetch(new GetAlarmArchiveImportStatusRequest);
    }

    /**
     * Returns a list of records that reference this Alarm record: GET /logging/alarm/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetAlarmUsageRequest($id, $query));
    }

    /**
     * Gets all changes to Alarm records since the Alarms were last polled: GET /logging/alarm/monitor/{id}.
     */
    public function monitor(int $id): bool
    {
        return $this->perform(new GetAlarmMonitorRequest($id));
    }

    /**
     * Returns the information related to displaying alarms: GET /logging/alarm/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetAlarmSupportingInfoRequest);
    }

    /**
     * Marks one or more alarms as Acknowledged, resolving any applied actions: POST /logging/alarm/acknowledge.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function acknowledge(array $options = []): bool
    {
        return $this->perform(new AcknowledgeAlarmRequest($options));
    }

    /**
     * Deletes the Alarm record supplied, if they are none are currently in use: POST /logging/alarm/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAlarmViaPostRequest($id, $options));
    }

    /**
     * Imports an alarm archive from the file system back into the database: POST /logging/alarm/archive/import.
     *
     * @param  array<string, mixed>  $options
     */
    public function archiveImport(array $options = []): bool
    {
        return $this->perform(new PostAlarmArchiveImportRequest($options));
    }

    /**
     * Deletes the Alarm record or records supplied, if they are not currently in use: POST /logging/alarm/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAlarmsRequest(['id' => $ids]));
    }

    /**
     * Marks an alarm as Acknowledged, resolving any applied actions: POST /logging/alarm/{id}/acknowledge.
     *
     * @param  array<string, mixed>  $options
     */
    public function acknowledge2(int $id, array $options = []): bool
    {
        return $this->perform(new AcknowledgeAlarm2Request($id, $options));
    }

    /**
     * Stops collecting changes made to Alarm records for the specified monitor: POST /logging/alarm/monitor/{id}/stop.
     *
     * @param  array<string, mixed>  $options
     */
    public function stopMonitor(int $id, array $options = []): bool
    {
        return $this->perform(new StopAlarmMonitorRequest($id, $options));
    }

    /**
     * Begins collecting changes made to Alarm records matching the supplied filter: POST /logging/alarm/monitor/start.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, AlarmStartAlarmMonitor>
     */
    public function startMonitor(array $options = []): Collection
    {
        return $this->fetch(new StartAlarmMonitorRequest($options));
    }
}
