<?php

namespace spkm\FortiNac\Resources\Host;

use spkm\FortiNac\Data\Host\Aging;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingRegisteredRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingUnregisteredRequest;
use spkm\FortiNac\Requests\Host\Aging\ClearAgingUsersRequest;
use spkm\FortiNac\Requests\Host\Aging\GetAgingRequest;
use spkm\FortiNac\Requests\Host\Aging\UpdateAgingRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Aging, from FortiNac::host()->aging().
 *
 * @extends SingletonResource<Aging>
 */
class AgingResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Aging::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetAgingRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateAgingRequest([...$body, ...$options]);
    }

    /**
     * Clear Aging values for all registered and guest hosts: POST /host/aging/clear-registered.
     *
     * @param  array<string, mixed>  $options
     */
    public function clearRegistered(array $options = []): bool
    {
        return $this->perform(new ClearAgingRegisteredRequest($options));
    }

    /**
     * Clear Aging values for all unregistered(rogue) hosts: POST /host/aging/clear-unregistered.
     *
     * @param  array<string, mixed>  $options
     */
    public function clearUnregistered(array $options = []): bool
    {
        return $this->perform(new ClearAgingUnregisteredRequest($options));
    }

    /**
     * Clear Aging values for all Users: POST /host/aging/clear-users.
     *
     * @param  array<string, mixed>  $options
     */
    public function clearUsers(array $options = []): bool
    {
        return $this->perform(new ClearAgingUsersRequest($options));
    }
}
