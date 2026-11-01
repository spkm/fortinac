<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the configured Google Client ID, Project Number, and API Key: GET /settings/integration/google/client-id.
 */
class GetGoogleSettingsClientIdRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/client-id';
    }
}
