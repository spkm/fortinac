<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the list of Roles and Registration Types used to edit Vendor OUIs: GET /settings/integration/vendor-oui/supporting-info.
 */
class GetVendorOuiSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/supporting-info';
    }
}
