<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the full set of navigation available and favorited by the user, including any custom dashboards and navigation features settings: GET /user/current-session/navigation-settings.
 */
class GetCurrentSessionNavigationSettingsRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/navigation-settings';
    }
}
