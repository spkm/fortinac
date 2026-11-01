<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EventType record.
 */
readonly class EventType extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $eventTag = null,
        public ?string $elementType = null,
        public ?string $alarmTag = null,
        public ?int $version = null,
        public ?bool $systemOnly = null,
        public ?bool $ncm = null,
        public ?int $groupID = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $modifyAuditSummary = null,
        public ?string $addAuditSummary = null,
        public array $extra = [],
    ) {}
}
