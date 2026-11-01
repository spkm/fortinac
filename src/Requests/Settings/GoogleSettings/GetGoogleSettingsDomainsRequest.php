<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the list of domains configured to work with Google directory: GET /settings/integration/google/domains.
 */
class GetGoogleSettingsDomainsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/domains';
    }
}
