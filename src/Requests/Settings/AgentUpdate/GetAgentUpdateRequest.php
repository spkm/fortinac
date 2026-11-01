<?php

namespace spkm\FortiNac\Requests\Settings\AgentUpdate;

use spkm\FortiNac\Data\Settings\AgentUpdate;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Agent Update details: GET /settings/agent/agent-update.
 */
class GetAgentUpdateRequest extends ItemRequest
{
    protected ?string $dto = AgentUpdate::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-update';
    }
}
