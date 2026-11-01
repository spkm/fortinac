<?php

namespace spkm\FortiNac\Data\Policy;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventSummaryAlarmsTop record.
 */
readonly class SecurityEventSummaryAlarmsTop extends Data
{
    /**
     * @param  array<mixed>|null  $alarmCounts
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public mixed $errorMessage = null,
        public ?array $alarmCounts = null,
        public array $extra = [],
    ) {}
}
