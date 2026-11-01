<?php

namespace spkm\FortiNac\Requests\Settings\VendorOui;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\VendorOui;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Vendor OUI record in the database: POST /settings/integration/vendor-oui/{id}.
 */
class UpdateVendorOuiRequest extends WriteRequest
{
    protected ?string $dto = VendorOui::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/vendor-oui/'.$this->id;
    }
}
