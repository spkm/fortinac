<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\AgentUpdate;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\GetAgentUpdateRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\ResetAgentUpdateCounterRequest;
use spkm\FortiNac\Requests\Settings\AgentUpdate\UpdateAgentUpdateRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Agent Update, from FortiNac::settings()->agentUpdate().
 *
 * @extends SingletonResource<AgentUpdate>
 */
class AgentUpdateResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AgentUpdate::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetAgentUpdateRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateAgentUpdateRequest($body, $options);
    }

    /**
     * Reset the agent update counter: POST /settings/agent/agent-update/reset-counter.
     *
     * @param  array<string, mixed>  $options
     */
    public function resetCounter(array $options = []): bool
    {
        return $this->perform(new ResetAgentUpdateCounterRequest($options));
    }
}
