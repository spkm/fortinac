<?php

namespace spkm\FortiNac\Data\Radius;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RadiusHealthTimeline record.
 */
readonly class RadiusHealthTimeline extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $rejectCountByCause
     * @param  array<mixed>|null  $historicalStats
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $acceptCount = null,
        public ?int $rejectCount = null,
        public ?int $totalCount = null,
        public ?int $failureRate = null,
        public ?array $rejectCountByCause = null,
        public ?int $duration = null,
        public ?CarbonImmutable $date = null,
        public ?array $historicalStats = null,
        public array $extra = [],
    ) {}
}
