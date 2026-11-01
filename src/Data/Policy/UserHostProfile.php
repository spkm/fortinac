<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A UserHostProfile record.
 */
readonly class UserHostProfile extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $groupIDs
     * @param  array<mixed>|null  $weeklySchedule
     * @param  array<mixed>|null  $filterSet
     * @param  array<mixed>|null  $locationIDs
     * @param  array<mixed>|null  $radiusFilterSet
     * @param  array<mixed>|null  $groupNames
     * @param  array<mixed>|null  $locationNames
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?array $groupIDs = null,
        public ?bool $catchAll = null,
        public ?array $weeklySchedule = null,
        public ?array $filterSet = null,
        public ?array $locationIDs = null,
        public ?string $locationOperator = null,
        public ?string $groupOperator = null,
        public ?array $radiusFilterSet = null,
        public ?array $groupNames = null,
        public ?array $locationNames = null,
        public array $extra = [],
    ) {}
}
