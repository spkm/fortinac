<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Data\Logging\Alarm;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Alarm record with the supplied DBID: GET /logging/alarm/{id}.
 */
class GetAlarmRequest extends ItemRequest
{
    protected ?string $dto = Alarm::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/logging/alarm/'.$this->id;
    }
}
