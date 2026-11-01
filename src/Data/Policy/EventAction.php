<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EventAction record.
 */
readonly class EventAction extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $activities
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $onFailure = null,
        public ?CarbonImmutable $secondaryActionTimer = null,
        public ?array $activities = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public array $extra = [],
    ) {}
}
