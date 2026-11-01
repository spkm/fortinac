<?php

namespace spkm\FortiNac\Requests\Settings\AgentUpdate;

use spkm\FortiNac\Data\Settings\AgentUpdate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds or modifies the Agent Update Settings: POST /settings/agent/agent-update.
 */
class UpdateAgentUpdateRequest extends WriteRequest
{
    protected ?string $dto = AgentUpdate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-update';
    }
}
