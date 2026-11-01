<?php

namespace spkm\FortiNac\Requests\Settings\AgentPackage;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete the agent package: DELETE /settings/agent/agent-packages/{packageFile}.
 */
class DeleteAgentPackageRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $packageFile, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/agent/agent-packages/'.rawurlencode($this->packageFile);
    }
}
