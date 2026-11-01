<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CountAllVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CountVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\CreateVendorOuiRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteManyVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteVendorOuiRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\DeleteVendorOuiViaPostRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuiCountByIdRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuisRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\GetVendorOuiSupportingInfoRequest;
use spkm\FortiNac\Requests\Settings\VendorOui\UpdateVendorOuiRequest;

/**
 * Role, Vendor OUI, from FortiNac::settings()->vendorOuis().
 *
 * @extends Builder<VendorOui>
 */
class VendorOuiResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, VendorOui::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVendorOuisRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountVendorOuisRequest($query);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateVendorOuiRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateVendorOuiRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteVendorOuiRequest($this->intId($id), $options);
    }

    /**
     * Deletes the Vendor OUI record supplied, if they are not currently in use: POST /settings/integration/vendor-oui/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteVendorOuiViaPostRequest($id, $options));
    }

    /**
     * Returns the count of all Vendor OUI records in the database: GET /settings/integration/vendor-oui/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllVendorOuisRequest);
    }

    /**
     * Returns the Vendor OUI record with the supplied DBID: GET /settings/integration/vendor-oui/count/{id}.
     */
    public function countById(int $id): ?VendorOui
    {
        return $this->fetchOrNull(new GetVendorOuiCountByIdRequest($id));
    }

    /**
     * Returns the list of Roles and Registration Types used to edit Vendor OUIs: GET /settings/integration/vendor-oui/supporting-info.
     */
    public function supportingInfo(): mixed
    {
        return $this->fetch(new GetVendorOuiSupportingInfoRequest);
    }

    /**
     * Deletes the Vendor OUI record or records supplied, if they are not currently in use: POST /settings/integration/vendor-oui/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyVendorOuisRequest(['id' => $ids]));
    }
}
