<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Vendor OUI records which match the supplied filter: GET /settings/integration/vendor-oui.
 */
class GetVendorOuisRequest extends ListRequest
{
    protected ?string $dto = VendorOui::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui';
    }
}
