<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEvent;

use spkm\FortiNac\Data\Policy\SecurityEvent;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Event records matching the supplied filter: GET /policy/security-event/{id}.
 */
class GetSecurityEventRequest extends ItemRequest
{
    protected ?string $dto = SecurityEvent::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-event/'.$this->id;
    }
}
