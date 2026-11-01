<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SecurityRule record.
 */
readonly class SecurityRule extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $trigger
     * @param  array<mixed>|null  $hostProfile
     * @param  array<mixed>|null  $action
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?bool $enabled = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?array $trigger = null,
        public ?array $hostProfile = null,
        public ?string $conditionState = null,
        public ?int $triggerEmailGroup = null,
        public ?int $actionEmailGroup = null,
        public ?string $actionState = null,
        public ?array $action = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public array $extra = [],
    ) {}
}
