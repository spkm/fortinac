<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of Alarm records matching the supplied filter: GET /logging/alarm/count.
 */
class CountAlarmsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/logging/alarm/count';
    }
}
