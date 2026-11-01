<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Vendor OUI record to the database: POST /settings/integration/vendor-oui.
 */
class CreateVendorOuiRequest extends WriteRequest
{
    protected ?string $dto = VendorOui::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui';
    }
}
