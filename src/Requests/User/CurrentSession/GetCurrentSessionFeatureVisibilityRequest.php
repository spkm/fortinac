<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently enabled features for the system. This is a global setting for all users: GET /user/current-session/feature-visibility.
 */
class GetCurrentSessionFeatureVisibilityRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/feature-visibility';
    }
}
