<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new Google authentication domain: POST /settings/integration/google/domains.
 *
 * Parameters: domainName.
 */
class PostGoogleSettingsDomainsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/domains';
    }
}
