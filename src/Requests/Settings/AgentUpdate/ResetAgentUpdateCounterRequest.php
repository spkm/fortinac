<?php

namespace spkm\FortiNac\Requests\Settings\AgentUpdate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Reset the agent update counter: POST /settings/agent/agent-update/reset-counter.
 */
class ResetAgentUpdateCounterRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-update/reset-counter';
    }
}
