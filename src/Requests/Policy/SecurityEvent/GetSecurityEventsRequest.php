<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEvent;

use spkm\FortiNac\Data\Policy\SecurityEvent;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Event records matching the supplied filter: GET /policy/security-event.
 */
class GetSecurityEventsRequest extends ListRequest
{
    protected ?string $dto = SecurityEvent::class;

    public function resolveEndpoint(): string
    {
        return '/policy/security-event';
    }
}
