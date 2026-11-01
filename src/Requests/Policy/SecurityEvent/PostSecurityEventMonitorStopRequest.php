<?php

namespace spkm\FortiNac\Requests\Policy\SecurityEvent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Stops collecting changes made to Security Event records matching the supplied filter: POST /policy/security-event/{id}/monitor/stop.
 */
class PostSecurityEventMonitorStopRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/security-event/'.$this->id.'/monitor/stop';
    }
}
