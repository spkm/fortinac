<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the configured Google authentication domains to the list supplied, removing any that are not in that list: POST /settings/integration/google/domains/set.
 *
 * Parameters: domainName.
 */
class PostGoogleSettingsDomainsSetRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/domains/set';
    }
}
