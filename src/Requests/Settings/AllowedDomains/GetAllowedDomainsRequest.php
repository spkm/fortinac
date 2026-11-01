<?php

namespace spkm\FortiNac\Requests\Settings\AllowedDomains;

use spkm\FortiNac\Data\Settings\AllowedDomains;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured allowed domains info: GET /settings/device/allowed-domains.
 */
class GetAllowedDomainsRequest extends ItemRequest
{
    protected ?string $dto = AllowedDomains::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/allowed-domains';
    }
}
