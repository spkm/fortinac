<?php

namespace spkm\FortiNac\Requests\Settings\AgentPackage;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Delete the agent package: POST /settings/agent/agent-packages/{packageFile}/delete.
 */
class DeleteAgentPackageViaPostRequest extends ActionRequest
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
        return '/settings/agent/agent-packages/'.rawurlencode($this->packageFile).'/delete';
    }
}
