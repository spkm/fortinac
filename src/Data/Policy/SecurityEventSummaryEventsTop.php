<?php

namespace spkm\FortiNac\Data\Policy;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventSummaryEventsTop record.
 */
readonly class SecurityEventSummaryEventsTop extends Data
{
    /**
     * @param  array<mixed>|null  $eventCounts
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public mixed $errorMessage = null,
        public ?array $eventCounts = null,
        public array $extra = [],
    ) {}
}
