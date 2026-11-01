<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of Vendor OUI records matching the supplied filter: GET /settings/integration/vendor-oui/count.
 */
class CountVendorOuisRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/count';
    }
}
