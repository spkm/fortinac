<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEvent;

use spkm\FortiNac\Data\Policy\SecurityEvent;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Begins collecting changes made to Security Event records matching the supplied filter: POST /policy/security-event/monitor/start.
 */
class StartSecurityEventMonitorRequest extends ActionRequest
{
    protected ?string $dto = SecurityEvent::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/policy/security-event/monitor/start';
    }
}
