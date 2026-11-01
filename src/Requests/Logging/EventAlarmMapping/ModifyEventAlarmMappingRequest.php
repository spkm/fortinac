<?php

namespace spkm\FortiNac\Requests\Logging\EventAlarmMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets common configuration values for several Event to Alarm Mappings in a single request: POST /logging/event-alarm-mapping/modify.
 *
 * Parameters: severity, notifyGroupID, notifyByEmail, notifyBySMS, ids.
 */
class ModifyEventAlarmMappingRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/event-alarm-mapping/modify';
    }
}
