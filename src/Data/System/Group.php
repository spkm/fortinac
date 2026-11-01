<?php

namespace spkm\FortiNac\Data\System;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Group record.
 */
readonly class Group extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $members
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $landscape = null,
        public ?int $dbid = null,
        public ?int $elementClass = null,
        public ?string $name = null,
        public ?bool $userGroup = null,
        public ?string $description = null,
        public ?int $accessPolicy = null,
        public ?int $daysValid = null,
        public ?int $daysInactive = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $nameLabel = null,
        public ?array $members = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public array $extra = [],
    ) {}
}
