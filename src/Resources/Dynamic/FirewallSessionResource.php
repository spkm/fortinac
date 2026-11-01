<?php

namespace spkm\FortiNac\Resources\Dynamic;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Data\Dynamic\FirewallSessionPollingById;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\CreateFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteFirewallSessionViaPostRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\DeleteManyFirewallSessionsRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionHostByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionPollingByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionsRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\GetFirewallSessionUsageRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\PostFirewallSessionPollingByIdRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\PostFirewallSessionPollingRunRequest;
use spkm\FortiNac\Requests\Dynamic\FirewallSession\UpdateFirewallSessionRequest;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Firewall Session, from FortiNac::firewallSessions().
 *
 * @extends Builder<FirewallSession>
 */
class FirewallSessionResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, FirewallSession::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetFirewallSessionsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetFirewallSessionRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateFirewallSessionRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateFirewallSessionRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteFirewallSessionRequest($this->intId($id), $options);
    }

    /**
     * Queues a poll for firewall sessions on the supplied device: POST /dynamic/dynamic-connection/polling/{id}/run.
     *
     * @param  array<string, mixed>  $options
     */
    public function pollingRun(int $id, array $options = []): bool
    {
        return $this->perform(new PostFirewallSessionPollingRunRequest($id, $options));
    }

    /**
     * Returns the firewall session polling status for the supplied device: GET /dynamic/dynamic-connection/polling/{id}.
     */
    public function pollingById(int $id): mixed
    {
        return $this->fetch(new GetFirewallSessionPollingByIdRequest($id));
    }

    /**
     * Returns a list of adapter MAC addresses owned by the supplied Host Record: GET /dynamic/dynamic-connection/host/{id}.
     */
    public function hostById(int $id): mixed
    {
        return $this->fetch(new GetFirewallSessionHostByIdRequest($id));
    }

    /**
     * Returns a list of records that reference this record: GET /dynamic/dynamic-connection/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetFirewallSessionUsageRequest($id));
    }

    /**
     * Deletes a single record by ID: POST /dynamic/dynamic-connection/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteFirewallSessionViaPostRequest($id, $options));
    }

    /**
     * Updates the firewall session polling configuration for the supplied device: POST /dynamic/dynamic-connection/polling/{id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function pollingById2(int $id, array|Data $attributes = [], array $options = []): ?FirewallSessionPollingById
    {
        return $this->fetch(new PostFirewallSessionPollingByIdRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Deletes a list of records supplied under the id parameter: POST /dynamic/dynamic-connection/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyFirewallSessionsRequest(['id' => $ids]));
    }
}
