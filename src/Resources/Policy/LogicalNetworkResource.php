<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\LogicalNetwork;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\AddLogicalNetworkPredefinedNetworkAccessRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\CreateLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteLogicalNetworkViaPostRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\DeleteManyLogicalNetworksRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworkRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworksRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\GetLogicalNetworkUsageRequest;
use spkm\FortiNac\Requests\Policy\LogicalNetwork\UpdateLogicalNetworkRequest;

/**
 * Logical Network, from FortiNac::policy()->logicalNetworks().
 *
 * @extends Builder<LogicalNetwork>
 */
class LogicalNetworkResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, LogicalNetwork::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetLogicalNetworksRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetLogicalNetworkRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateLogicalNetworkRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateLogicalNetworkRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteLogicalNetworkRequest((int) $id, $options);
    }

    /**
     * Creates a predefined set of Logical Networks and Policies: POST /policy/logical-network/add-predefined-network-access.
     *
     * @param  array<string, mixed>  $options
     */
    public function addPredefinedNetworkAccess(array $options = []): bool
    {
        return $this->perform(new AddLogicalNetworkPredefinedNetworkAccessRequest($options));
    }

    /**
     * Deletes a list of records supplied under the id parameter: POST /policy/logical-network/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyLogicalNetworksRequest(['id' => $ids]));
    }

    /**
     * Deletes a single record by ID: POST /policy/logical-network/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteLogicalNetworkViaPostRequest($id, $options));
    }

    /**
     * Returns a list of records that reference this record: GET /policy/logical-network/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetLogicalNetworkUsageRequest($id, $query));
    }
}
