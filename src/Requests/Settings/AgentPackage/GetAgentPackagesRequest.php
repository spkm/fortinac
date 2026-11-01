<?php

namespace spkm\FortiNac\Requests\Settings\AgentPackage;

use spkm\FortiNac\Data\Settings\AgentPackage;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the Agent Distribution Service: GET /settings/agent/agent-packages.
 */
class GetAgentPackagesRequest extends ListRequest
{
    protected ?string $dto = AgentPackage::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-packages';
    }
}
