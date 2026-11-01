<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Security Event Parser record, updating instead if the supplied profile has a DBID of tone that already exists: POST /settings/integration/security-event-parser.
 */
class CreateSecurityEventParserRequest extends WriteRequest
{
    protected ?string $dto = SecurityEventParser::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser';
    }
}
