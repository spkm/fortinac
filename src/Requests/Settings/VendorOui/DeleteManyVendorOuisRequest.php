<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Vendor OUI record or records supplied, if they are not currently in use: POST /settings/integration/vendor-oui/delete.
 *
 * Parameters: id.
 */
class DeleteManyVendorOuisRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/delete';
    }
}
