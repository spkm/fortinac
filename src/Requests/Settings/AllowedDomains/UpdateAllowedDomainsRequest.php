<?php

namespace spkm\FortiNac\Requests\Settings\AllowedDomains;

use spkm\FortiNac\Data\Settings\AllowedDomains;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the Allowed Domains: POST /settings/device/allowed-domains.
 */
class UpdateAllowedDomainsRequest extends WriteRequest
{
    protected ?string $dto = AllowedDomains::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/allowed-domains';
    }
}
