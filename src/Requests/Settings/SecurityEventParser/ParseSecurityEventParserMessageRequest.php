<?php

namespace spkm\FortiNac\Requests\Settings\SecurityEventParser;

use spkm\FortiNac\Data\Settings\SecurityEventParserParseSecurityEventParserMessage;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Attempts to parse a message using the supplied format and delimiters. On a successful parse of a message, the name/value pairs are returned for the user to use when building a parser: POST /settings/integration/security-event-parser/parse-message.
 *
 * Parameters: message, format, delimiter, tagDelimiter.
 */
class ParseSecurityEventParserMessageRequest extends ActionRequest
{
    protected ?string $dto = SecurityEventParserParseSecurityEventParserMessage::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/security-event-parser/parse-message';
    }
}
