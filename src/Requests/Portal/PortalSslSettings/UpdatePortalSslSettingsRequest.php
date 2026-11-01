<?php

namespace spkm\FortiNac\Requests\Portal\PortalSslSettings;

use spkm\FortiNac\Data\Portal\PortalSslSettings;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Modifies portal SSL settings: POST /portal/settings/ssl.
 */
class UpdatePortalSslSettingsRequest extends WriteRequest
{
    protected ?string $dto = PortalSslSettings::class;

    public function resolveEndpoint(): string
    {
        return '/portal/settings/ssl';
    }
}
