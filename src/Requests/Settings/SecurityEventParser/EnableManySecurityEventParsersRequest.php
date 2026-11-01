<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Security Event Parser: POST /settings/integration/security-event-parser/enable.
 *
 * Parameters: id.
 */
class EnableManySecurityEventParsersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/enable';
    }
}
