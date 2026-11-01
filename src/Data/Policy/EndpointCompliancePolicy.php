<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EndpointCompliancePolicy record.
 */
readonly class EndpointCompliancePolicy extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $profile
     * @param  array<mixed>|null  $configuration
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $filterSet
     * @param  array<mixed>|null  $weeklySchedule
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
        public ?array $profile = null,
        public ?array $configuration = null,
        public ?bool $enabled = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?array $filterSet = null,
        public ?array $weeklySchedule = null,
        public ?string $configurationName = null,
        public array $extra = [],
    ) {}
}
