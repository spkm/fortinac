<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes one or more Google authentication domains: POST /settings/integration/google/domains/delete.
 *
 * Parameters: id.
 */
class PostGoogleSettingsDomainsDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/domains/delete';
    }
}
