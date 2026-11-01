<?php

namespace spkm\FortiNac\Resources\Logging;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Alarms, events, the audit log and the connection log. FortiNac::logging().
 *
 * @extends BaseResource<Data>
 */
class LoggingResources extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Alarm.
     */
    public function alarms(): AlarmResource
    {
        return new AlarmResource($this->connector);
    }

    /**
     * Audit Log.
     */
    public function audit(): AuditLogEntryResource
    {
        return new AuditLogEntryResource($this->connector);
    }

    /**
     * Connection Log.
     */
    public function connections(): ConnectionLogEntryResource
    {
        return new ConnectionLogEntryResource($this->connector);
    }

    /**
     * Event To Alarm Mapping.
     */
    public function eventAlarmMappings(): EventAlarmMappingResource
    {
        return new EventAlarmMappingResource($this->connector);
    }

    /**
     * Event Types.
     */
    public function eventTypes(): EventTypeResource
    {
        return new EventTypeResource($this->connector);
    }

    /**
     * Event.
     */
    public function events(): EventResource
    {
        return new EventResource($this->connector);
    }
}
