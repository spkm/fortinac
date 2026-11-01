<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\AgentPackage;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\DeleteAgentPackageRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\DeleteAgentPackageViaPostRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\GetAgentPackageAvailableAgentsRequest;
use spkm\FortiNac\Requests\Settings\AgentPackage\GetAgentPackagesRequest;

/**
 * Agent Packages, from FortiNac::settings()->agentPackages().
 *
 * @extends Builder<AgentPackage>
 */
class AgentPackageResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AgentPackage::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAgentPackagesRequest($query);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAgentPackageRequest((string) $id, $options);
    }

    /**
     * Returns the List of available agents to download: GET /settings/agent/agent-packages/available-agents.
     */
    public function availableAgents(): bool
    {
        return $this->perform(new GetAgentPackageAvailableAgentsRequest);
    }

    /**
     * Delete the agent package: POST /settings/agent/agent-packages/{packageFile}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(string $packageFile, array $options = []): bool
    {
        return $this->perform(new DeleteAgentPackageViaPostRequest($packageFile, $options));
    }
}
