<?php

namespace spkm\FortiNac\Requests\Settings\AgentProperties;

use spkm\FortiNac\Data\Settings\AgentProperties;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Configures security management properties for the Persistent Agent: POST /settings/agent/properties.
 */
class UpdateAgentPropertiesRequest extends WriteRequest
{
    protected ?string $dto = AgentProperties::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/properties';
    }
}
