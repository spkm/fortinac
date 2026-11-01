<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\NetworkAddressGroup;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\CreateNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteManyNetworkAddressGroupsRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\DeleteNetworkAddressGroupViaPostRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupsRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\GetNetworkAddressGroupUsageRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddressGroup\UpdateNetworkAddressGroupRequest;

/**
 * Network Address Group, from FortiNac::settings()->networkAddressGroups().
 *
 * @extends Builder<NetworkAddressGroup>
 */
class NetworkAddressGroupResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, NetworkAddressGroup::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkAddressGroupsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetNetworkAddressGroupRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateNetworkAddressGroupRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateNetworkAddressGroupRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteNetworkAddressGroupRequest((int) $id, $options);
    }

    /**
     * Returns a list of records that reference this Address record: GET /settings/device/network-address-group/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetNetworkAddressGroupUsageRequest($id));
    }

    /**
     * Deletes a list of Address records supplied under the id parameter: POST /settings/device/network-address-group/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyNetworkAddressGroupsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Address record by ID: POST /settings/device/network-address-group/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteNetworkAddressGroupViaPostRequest($id, $options));
    }
}
