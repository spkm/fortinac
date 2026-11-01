<?php

namespace spkm\FortiNac\Data\Policy;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventSummaryStatistics record.
 */
readonly class SecurityEventSummaryStatistics extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public mixed $errorMessage = null,
        public ?string $startDate = null,
        public ?string $endDate = null,
        public ?int $totalEventsRecorded = null,
        public ?int $totalAlarms = null,
        public ?int $hostsGeneratingAlarms = null,
        public ?int $totalEventsReceived = null,
        public ?int $totalEventsDiscarded = null,
        public ?int $totalHostsIsolated = null,
        public ?int $totalHostsRemediated = null,
        public ?int $totalKnownHosts = null,
        public ?int $totalUnknownHosts = null,
        public ?int $eventsUsedInAlarms = null,
        public ?int $alarmsWithActionNotTaken = null,
        public ?int $alarmsWithActionTaken = null,
        public ?int $alarmsWithActionTakenAndUndone = null,
        public ?bool $success = null,
        public mixed $error = null,
        public array $extra = [],
    ) {}
}
