<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A SecurityEventParserTestSecurityEventParser record.
 */
readonly class SecurityEventParserTestSecurityEventParser extends Data
{
    /**
     * @param  array<mixed>|null  $queryFilters
     * @param  array<mixed>|null  $ordering
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $firstRecord = null,
        public ?bool $count = null,
        public ?bool $cacheable = null,
        public ?bool $distinct = null,
        public ?array $queryFilters = null,
        public ?string $vendor = null,
        public ?int $format = null,
        public ?string $delimiter = null,
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
        public ?string $severityMatcher = null,
        public ?string $severityValue = null,
        public ?bool $isRTR = null,
        public ?string $severityColumn = null,
        public ?bool $isEnabled = null,
        public ?string $name = null,
        public ?int $dbid = null,
        public ?array $ordering = null,
        public ?bool $countFilter = null,
        public ?int $resultLimit = null,
        public array $extra = [],
    ) {}
}
