<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\NetworkAddress;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\CreateNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteManyNetworkAddressesRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\DeleteNetworkAddressViaPostRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressesRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\GetNetworkAddressUsageRequest;
use spkm\FortiNac\Requests\Settings\NetworkAddress\UpdateNetworkAddressRequest;

/**
 * Network Address, from FortiNac::settings()->networkAddresses().
 *
 * @extends Builder<NetworkAddress>
 */
class NetworkAddressResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, NetworkAddress::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNetworkAddressesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetNetworkAddressRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateNetworkAddressRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateNetworkAddressRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteNetworkAddressRequest((int) $id, $options);
    }

    /**
     * Returns a list of records that reference this Address record: GET /settings/device/network-address/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetNetworkAddressUsageRequest($id, $query));
    }

    /**
     * Deletes a list of Address records supplied under the id parameter: POST /settings/device/network-address/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyNetworkAddressesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Address record by ID: POST /settings/device/network-address/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteNetworkAddressViaPostRequest($id, $options));
    }
}
