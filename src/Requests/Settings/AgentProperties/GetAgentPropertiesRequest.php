<?php

namespace spkm\FortiNac\Requests\Settings\AgentProperties;

use spkm\FortiNac\Data\Settings\AgentProperties;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of security management properties for the Persistent Agent: GET /settings/agent/properties.
 */
class GetAgentPropertiesRequest extends ItemRequest
{
    protected ?string $dto = AgentProperties::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/properties';
    }
}
