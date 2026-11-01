<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A DirectoryAgent record.
 */
readonly class DirectoryAgent extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $addGroupListCopy
     * @param  array<mixed>|null  $addToGroupIDs
     * @param  array<mixed>|null  $addToGroupNames
     * @param  array<mixed>|null  $addGroupList
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $name = null,
        public ?bool $registerRogue = null,
        public ?bool $registerByUser = null,
        public ?string $appliedGroupName = null,
        public ?string $policyName = null,
        public ?int $scanGraceLength = null,
        public ?bool $enabled = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?array $addGroupListCopy = null,
        public ?array $addToGroupIDs = null,
        public ?array $addToGroupNames = null,
        public ?array $addGroupList = null,
        public ?bool $debug = null,
        public array $extra = [],
    ) {}
}
