<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Security Event Parser records matching the supplied filter: GET /settings/integration/security-event-parser.
 */
class GetSecurityEventParsersRequest extends ListRequest
{
    protected ?string $dto = SecurityEventParser::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser';
    }
}
