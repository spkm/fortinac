<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Role record.
 */
readonly class Role extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $groupIDs
     * @param  array<mixed>|null  $groupNames
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $groups
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?array $groupIDs = null,
        public ?array $groupNames = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?array $groups = null,
        public array $extra = [],
    ) {}
}
