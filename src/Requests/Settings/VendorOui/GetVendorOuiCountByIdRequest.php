<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Vendor OUI record with the supplied DBID: GET /settings/integration/vendor-oui/count/{id}.
 */
class GetVendorOuiCountByIdRequest extends ItemRequest
{
    protected ?string $dto = VendorOui::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/count/'.$this->id;
    }
}
