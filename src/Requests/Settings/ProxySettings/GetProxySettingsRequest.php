<?php

namespace spkm\FortiNac\Requests\Settings\ProxySettings;

use spkm\FortiNac\Data\Settings\ProxySettings;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured Proxy settings: GET /settings/integration/proxy.
 */
class GetProxySettingsRequest extends ItemRequest
{
    protected ?string $dto = ProxySettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/proxy';
    }
}
