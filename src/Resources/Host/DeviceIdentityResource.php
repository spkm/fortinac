<?php

namespace spkm\FortiNac\Resources\Host;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Host\DeviceIdentity;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\ConfirmDeviceIdentityRuleRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CountAllDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CountDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\CreateDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteDeviceIdentityViaPostRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\DeleteManyDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentitiesRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityFingerprintByIdRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityFingerprintsRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\GetDeviceIdentityUsageRequest;
use spkm\FortiNac\Requests\Host\DeviceIdentity\UpdateDeviceIdentityRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Device Identity, from FortiNac::host()->deviceIdentities().
 *
 * @extends Builder<DeviceIdentity>
 */
class DeviceIdentityResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DeviceIdentity::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceIdentitiesRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountDeviceIdentitiesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDeviceIdentityRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDeviceIdentityRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDeviceIdentityRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDeviceIdentityRequest($this->intId($id), $options);
    }

    /**
     * Returns the count of all Device identity records in the database: GET /host/device-identity/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllDeviceIdentitiesRequest);
    }

    /**
     * Returns a list of records that reference this Device Identity record: GET /host/device-identity/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetDeviceIdentityUsageRequest($id));
    }

    /**
     * Returns the full Fingerprint information, including attributes, for a specified fingerprint: GET /host/device-identity/fingerprints.
     *
     * @param  array<string, mixed>  $options  Query options: ids
     */
    public function fingerprints(array $options = []): mixed
    {
        return $this->fetch(new GetDeviceIdentityFingerprintsRequest($options));
    }

    /**
     * Returns the full Fingerprint information, including attributes, for a specified fingerprint: GET /host/device-identity/fingerprint/{id}.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function fingerprintById(int $id, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceIdentityFingerprintByIdRequest($id, $options));
    }

    /**
     * Deletes the Device Identity record or records supplied, if they are not currently in use: POST /host/device-identity/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDeviceIdentitiesRequest(['id' => $ids]));
    }

    /**
     * Deletes the Device Identity record supplied, if they are not currently in use: POST /host/device-identity/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDeviceIdentityViaPostRequest($id, $options));
    }

    /**
     * Confirms a rule in Profiled Devices view: POST /host/device-identity/confirm-rule.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function confirmRule(array $options = []): bool
    {
        return $this->perform(new ConfirmDeviceIdentityRuleRequest($options));
    }
}
