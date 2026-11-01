<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Data\Logging\Alarm;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Alarm records which match the supplied filter: GET /logging/alarm.
 */
class GetAlarmsRequest extends ListRequest
{
    protected ?string $dto = Alarm::class;

    public function resolveEndpoint(): string
    {
        return '/logging/alarm';
    }
}
