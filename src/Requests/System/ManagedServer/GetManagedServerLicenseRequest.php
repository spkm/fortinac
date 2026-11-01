<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Data\System\ManagedServerLicense;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the current license information for this server and all managed server: GET /system/properties/license.
 */
class GetManagedServerLicenseRequest extends ItemRequest
{
    protected ?string $dto = ManagedServerLicense::class;

    public function resolveEndpoint(): string
    {
        return '/system/properties/license';
    }
}
