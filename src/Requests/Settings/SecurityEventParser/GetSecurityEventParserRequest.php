<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Data\Settings\SecurityEventParser;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Security Event Parser records matching the supplied filter: GET /settings/integration/security-event-parser/{id}.
 */
class GetSecurityEventParserRequest extends ItemRequest
{
    protected ?string $dto = SecurityEventParser::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/'.$this->id;
    }
}
