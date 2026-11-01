<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventParserParseSecurityEventParserMessage record.
 */
readonly class SecurityEventParserParseSecurityEventParserMessage extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $additionalProp1 = null,
        public ?string $additionalProp2 = null,
        public ?string $additionalProp3 = null,
        public array $extra = [],
    ) {}
}
