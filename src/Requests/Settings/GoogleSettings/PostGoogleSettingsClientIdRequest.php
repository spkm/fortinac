<?php

namespace spkm\FortiNac\Requests\Settings\GoogleSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the Google Client ID, Project Number, and API Key: POST /settings/integration/google/client-id.
 *
 * Parameters: clientID, senderID, apiKey.
 */
class PostGoogleSettingsClientIdRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/google/client-id';
    }
}
