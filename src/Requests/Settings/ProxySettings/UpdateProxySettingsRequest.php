<?php

namespace spkm\FortiNac\Requests\Settings\ProxySettings;

use spkm\FortiNac\Data\Settings\ProxySettings;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Add Proxy settings: POST /settings/integration/proxy.
 */
class UpdateProxySettingsRequest extends ActionRequest
{
    protected ?string $dto = ProxySettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/proxy';
    }
}
