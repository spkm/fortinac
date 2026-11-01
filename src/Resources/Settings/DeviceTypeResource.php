<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\DeviceType;
use spkm\FortiNac\Data\Settings\DeviceTypeImageArchive;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\CreateDeviceTypeFromArchiveRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\CreateDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteDeviceTypeViaPostRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\DeleteManyDeviceTypesRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeImageArchiveRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypesRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\GetDeviceTypeUsageRequest;
use spkm\FortiNac\Requests\Settings\DeviceType\UpdateDeviceTypeRequest;

/**
 * Device Type, from FortiNac::settings()->deviceTypes().
 *
 * @extends Builder<DeviceType>
 */
class DeviceTypeResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, DeviceType::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceTypesRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDeviceTypeRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDeviceTypeRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDeviceTypeRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDeviceTypeRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Device Type record: GET /settings/device/device-type/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetDeviceTypeUsageRequest($id));
    }

    /**
     * Returns the images currently uploaded to the system: GET /settings/device/device-type/image/archive.
     */
    public function imageArchive(): ?DeviceTypeImageArchive
    {
        return $this->fetchOrNull(new GetDeviceTypeImageArchiveRequest);
    }

    /**
     * Creates a new Device Type record, and assigns it an image from the image archive: POST /settings/device/device-type/createFromArchive.
     *
     * @param  array<string, mixed>  $options  Query options: imageName
     */
    public function createFromArchive(array $options = []): bool
    {
        return $this->perform(new CreateDeviceTypeFromArchiveRequest($options));
    }

    /**
     * Deletes a list of Device Type records supplied under the id parameter: POST /settings/device/device-type/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDeviceTypesRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Device Type record by ID: POST /settings/device/device-type/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDeviceTypeViaPostRequest($id, $options));
    }
}
