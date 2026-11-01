<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\SecurityEventParserTestSecurityEventParser;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Tests parsing a text value into a Security Event, including debug information from the parsing process: POST /settings/integration/security-event-parser/{id}/test.
 */
class TestSecurityEventParserRequest extends WriteRequest
{
    protected ?string $dto = SecurityEventParserTestSecurityEventParser::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/'.$this->id.'/test';
    }
}
