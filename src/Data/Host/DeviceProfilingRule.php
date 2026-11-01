<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A DeviceProfilingRule record.
 */
readonly class DeviceProfilingRule extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $type
     * @param  array<mixed>|null  $methods
     * @param  array<mixed>|null  $weeklySchedule
     * @param  array<mixed>|null  $failedValidationAction
     * @param  array<mixed>|null  $tags
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $name = null,
        public ?array $type = null,
        public ?bool $notify = null,
        public ?bool $registerAutomatically = null,
        public ?bool $registerClient = null,
        public ?bool $registerToLoggedInUser = null,
        public ?string $role = null,
        public ?bool $addToGroup = null,
        public ?int $groupId = null,
        public ?bool $addToDomain = null,
        public ?int $domainId = null,
        public ?string $state = null,
        public ?int $version = null,
        public ?int $rank = null,
        public ?bool $enabled = null,
        public ?array $methods = null,
        public ?string $description = null,
        public ?string $sponsorNote = null,
        public ?array $weeklySchedule = null,
        public ?bool $reValidation = null,
        public ?int $reValidationInterval = null,
        public ?array $failedValidationAction = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $registerToUser = null,
        public ?array $tags = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $modifyAuditSummary = null,
        public ?string $addAuditSummary = null,
        public ?bool $catchAll = null,
        public ?string $methodSummaryString = null,
        public array $extra = [],
    ) {}
}
