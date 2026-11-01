<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEvent;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets all changes to Security Event records since the Events were last polled: GET /policy/security-event/{id}/monitor.
 */
class GetSecurityEventMonitorRequest extends ItemRequest
{
    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/security-event/'.$this->id.'/monitor';
    }
}
