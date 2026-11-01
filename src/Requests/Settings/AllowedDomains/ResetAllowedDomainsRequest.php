<?php

namespace spkm\FortiNac\Requests\Settings\AllowedDomains;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Resets Allowed Domains to Default: POST /settings/device/allowed-domains/reset.
 */
class ResetAllowedDomainsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/allowed-domains/reset';
    }
}
