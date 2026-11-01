<?php

namespace spkm\FortiNac\Requests\Settings\AgentPackage;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the List of available agents to download: GET /settings/agent/agent-packages/available-agents.
 */
class GetAgentPackageAvailableAgentsRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-packages/available-agents';
    }
}
