<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SyslogServer record.
 */
readonly class SyslogServer extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $severityMap
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?bool $isRTR = null,
        public ?bool $isEnabled = null,
        public ?string $name = null,
        public ?string $vendor = null,
        public ?int $format = null,
        public ?string $delimiter = null,
        public ?string $tagDelimiter = null,
        public ?string $sourceIPColumn = null,
        public ?string $sourceIPMatcher = null,
        public ?string $sourceIPValue = null,
        public ?string $destinationIPColumn = null,
        public ?string $destinationIPMatcher = null,
        public ?string $destinationIPValue = null,
        public ?string $typeColumn = null,
        public ?string $typeMatcher = null,
        public ?string $typeValue = null,
        public ?string $subtypeColumn = null,
        public ?string $subtypeMatcher = null,
        public ?string $subtypeValue = null,
        public ?string $threatIDColumn = null,
        public ?string $threatIDMatcher = null,
        public ?string $threatIDValue = null,
        public ?string $descriptionColumn = null,
        public ?string $descriptionMatcher = null,
        public ?string $descriptionValue = null,
        public ?string $severityColumn = null,
        public ?string $severityMatcher = null,
        public ?string $severityValue = null,
        public ?array $severityMap = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public array $extra = [],
    ) {}
}
