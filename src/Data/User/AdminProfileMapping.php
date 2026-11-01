<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AdminProfileMapping record.
 */
readonly class AdminProfileMapping extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $group
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $adminProfileDBID = null,
        public ?int $groupDBID = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $groupName = null,
        public ?array $group = null,
        public array $extra = [],
    ) {}
}
