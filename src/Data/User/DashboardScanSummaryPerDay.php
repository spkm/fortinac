<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A DashboardScanSummaryPerDay record.
 */
readonly class DashboardScanSummaryPerDay extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?CarbonImmutable $date = null,
        public ?int $passed = null,
        public ?int $failed = null,
        public ?int $scriptFailed = null,
        public ?int $warning = null,
        public array $extra = [],
    ) {}
}
