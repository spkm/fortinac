<?php

namespace spkm\FortiNac\Resources\Host;

use spkm\FortiNac\Data\Host\DeviceIdentitySource;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\CreateDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteDeviceIdentitySourceViaPostRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DeleteManyDeviceIdentitySourcesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\DisableDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\EnableDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\GetDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\GetDeviceIdentitySourcesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\SetDeviceIdentitySourceRankRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\SwapDeviceIdentitySourceRanksRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentitySource\UpdateDeviceIdentitySourceRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Device Identity Source, from FortiNac::host()->deviceIdentitySources().
 *
 * @extends Builder<DeviceIdentitySource>
 */
class DeviceIdentitySourceResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DeviceIdentitySource::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceIdentitySourcesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDeviceIdentitySourceRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDeviceIdentitySourceRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDeviceIdentitySourceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDeviceIdentitySourceRequest((int) $id, $options);
    }

    /**
     * Deletes a list of Device Identity Source records supplied under the id parameter: POST /host/device-identity-source/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDeviceIdentitySourcesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Device Identity Source record by ID: POST /host/device-identity-source/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDeviceIdentitySourceViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied Device Identity Source: POST /host/device-identity-source/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableDeviceIdentitySourceRequest($id, $options));
    }

    /**
     * Enables the supplied Device Identity Source: POST /host/device-identity-source/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableDeviceIdentitySourceRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied Device Identity Source, shifting other ranks as necessary: POST /host/device-identity-source/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetDeviceIdentitySourceRankRequest($options));
    }

    /**
     * Swaps the rank position of the two supplied Device Identity Source: POST /host/device-identity-source/rank/swap.
     *
     * @param  array<string, mixed>  $options  Query options: id1, id2
     */
    public function swapRanks(array $options = []): bool
    {
        return $this->perform(new SwapDeviceIdentitySourceRanksRequest($options));
    }
}
