<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Queues a poll for firewall sessions on the supplied device: POST /dynamic/dynamic-connection/polling/{id}/run.
 */
class PostFirewallSessionPollingRunRequest extends ActionRequest
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
        return '/dynamic/dynamic-connection/polling/'.$this->id.'/run';
    }
}
