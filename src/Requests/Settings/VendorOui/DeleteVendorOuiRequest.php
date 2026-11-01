<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the Vendor OUI record supplied, if it is not currently in use: DELETE /settings/integration/vendor-oui/{id}.
 */
class DeleteVendorOuiRequest extends DeleteRequest
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
        return '/settings/integration/vendor-oui/'.$this->id;
    }
}
