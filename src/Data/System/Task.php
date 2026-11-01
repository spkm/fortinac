<?php

namespace spkm\FortiNac\Data\System;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Task record.
 */
readonly class Task extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public mixed $state = null,
        public mixed $elementType = null,
        public ?string $nameTag = null,
        public mixed $scheduledObjectType = null,
        public ?string $eventTag = null,
        public mixed $taskType = null,
        public ?float $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?string $taskValue = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $modifyAuditSummary = null,
        public ?string $addAuditSummary = null,
        public ?string $message = null,
        public ?string $description = null,
        public ?string $removeMessage = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
