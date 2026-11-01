<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\CreateDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteDirectoryAgentViaPostRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DeleteManyDirectoryAgentsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\DisableDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\EnableDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentDirectoryGroupsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentGroupsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentsRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentSubnetRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentSubnetTestRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\GetDirectoryAgentUsageRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\PostDirectoryAgentSubnetDeleteRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\PostDirectoryAgentSubnetRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\SetDirectoryAgentRankRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\SwapDirectoryAgentRanksRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\TestDirectoryAgentRequest;
use spkm\FortiNac\Requests\Settings\DirectoryAgent\UpdateDirectoryAgentRequest;

/**
 * Directory Agent Config, from FortiNac::settings()->directoryAgents().
 *
 * @extends Builder<DirectoryAgent>
 */
class DirectoryAgentResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DirectoryAgent::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDirectoryAgentsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDirectoryAgentRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDirectoryAgentRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDirectoryAgentRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDirectoryAgentRequest((int) $id, $options);
    }

    /**
     * Returns all Device Groups for use when creating Directory Agent Configurations: GET /settings/agent/directory-agent/directory-groups.
     */
    public function directoryGroups(): mixed
    {
        return $this->fetch(new GetDirectoryAgentDirectoryGroupsRequest);
    }

    /**
     * Returns all Device Groups for use when creating Directory Agent Configurations: GET /settings/agent/directory-agent/groups.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function groups(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDirectoryAgentGroupsRequest($query));
    }

    /**
     * Returns a list of records that reference this Directory Agent Configuration record: GET /settings/agent/directory-agent/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetDirectoryAgentUsageRequest($id));
    }

    /**
     * Returns all IP ranges currently configured for Directory Agent Configurations: GET /settings/agent/directory-agent/subnet.
     */
    public function subnet(): mixed
    {
        return $this->fetch(new GetDirectoryAgentSubnetRequest);
    }

    /**
     * Test if the supplied IP address exists in any configured IP ranges: GET /settings/agent/directory-agent/subnet/test.
     */
    public function subnetTest(): mixed
    {
        return $this->fetch(new GetDirectoryAgentSubnetTestRequest);
    }

    /**
     * Deletes a list of Directory Agent Configuration records supplied under the id parameter: POST /settings/agent/directory-agent/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDirectoryAgentsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Directory Agent Configuration record by ID: POST /settings/agent/directory-agent/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDirectoryAgentViaPostRequest($id, $options));
    }

    /**
     * Adds a new IP range of subnet to allow the Directory agent configurations: POST /settings/agent/directory-agent/subnet.
     *
     * @param  array<string, mixed>  $options  Query options: startIP, endIP
     */
    public function subnet2(array $options = []): bool
    {
        return $this->perform(new PostDirectoryAgentSubnetRequest($options));
    }

    /**
     * Disables the supplied Directory Agent Configuration: POST /settings/agent/directory-agent/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableDirectoryAgentRequest($id, $options));
    }

    /**
     * Tests the Directory Agent Configurations using the supplied Username and Domain name: POST /settings/agent/directory-agent/test.
     *
     * @param  array<string, mixed>  $options  Query options: usrname, domain
     */
    public function test(array $options = []): bool
    {
        return $this->perform(new TestDirectoryAgentRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Directory Agent Configurations: POST /settings/agent/directory-agent/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapDirectoryAgentRanksRequest($options));
    }

    /**
     * Deletes the subnet or subnets from the set of configured IP ranges: POST /settings/agent/directory-agent/subnet/delete.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function subnetDelete(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new PostDirectoryAgentSubnetDeleteRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Sets the rank of the supplied Directory Agent Configuration, shifting other rank as necessary: POST /settings/agent/directory-agent/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetDirectoryAgentRankRequest($options));
    }

    /**
     * Enables the supplied Directory Agent Configuration: POST /settings/agent/directory-agent/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableDirectoryAgentRequest($id, $options));
    }
}
