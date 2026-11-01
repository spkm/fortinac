<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Security Event Parser: POST /settings/integration/security-event-parser/disable.
 *
 * Parameters: id.
 */
class DisableManySecurityEventParsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/disable';
    }
}
