<?php

namespace spkm\FortiNac\Requests\Portal\PortalSslSettings;

use spkm\FortiNac\Data\Portal\PortalSslSettings;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured portal SSL settings: GET /portal/settings/ssl.
 */
class GetPortalSslSettingsRequest extends ItemRequest
{
    protected ?string $dto = PortalSslSettings::class;

    public function resolveEndpoint(): string
    {
        return '/portal/settings/ssl';
    }
}
