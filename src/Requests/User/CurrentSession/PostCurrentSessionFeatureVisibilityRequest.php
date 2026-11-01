<?php

namespace spkm\FortiNac\Requests\User\CurrentSession;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the currently enabled features for the system. This is a global settings for all users: POST /user/current-session/feature-visibility.
 */
class PostCurrentSessionFeatureVisibilityRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/current-session/feature-visibility';
    }
}
