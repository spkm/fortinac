<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Vendor OUI records in the database: GET /settings/integration/vendor-oui/count/all.
 */
class CountAllVendorOuisRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/count/all';
    }
}
