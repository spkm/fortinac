<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information related to displaying alarms: GET /logging/alarm/supporting-info.
 */
class GetAlarmSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/alarm/supporting-info';
    }
}
