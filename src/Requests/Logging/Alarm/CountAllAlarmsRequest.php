<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return the count of all Alarm records in the database: GET /logging/alarm/count/all.
 */
class CountAllAlarmsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/count/all';
    }
}
