<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Vendor OUI record supplied, if they are not currently in use: POST /settings/integration/vendor-oui/{id}/delete.
 */
class DeleteVendorOuiViaPostRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/'.$this->id.'/delete';
    }
}
