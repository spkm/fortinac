<?php

namespace spkm\FortiNac\Data\Policy;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventSummaryHostsTop record.
 */
readonly class SecurityEventSummaryHostsTop extends Data
{
    /**
     * @param  array<mixed>|null  $hostCounts
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?array $hostCounts = null,
        public array $extra = [],
    ) {}
}
