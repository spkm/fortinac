<?php

namespace spkm\FortiNac\Requests\Policy\SecurityAlarm;

use spkm\FortiNac\Data\Policy\SecurityAlarm;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Alarm records matching the supplied filter: GET /policy/security-alarm/{id}.
 */
class GetSecurityAlarmRequest extends ItemRequest
{
    protected ?string $dto = SecurityAlarm::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-alarm/'.$this->id;
    }
}
