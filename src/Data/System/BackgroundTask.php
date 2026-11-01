<?php

namespace spkm\FortiNac\Data\System;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A BackgroundTask record.
 */
readonly class BackgroundTask extends Data
{
    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $attributes
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public mixed $childTasks = null,
        public mixed $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?int $id = null,
        public ?string $message = null,
        public ?int $assigner = null,
        public mixed $assignee = null,
        public ?string $note = null,
        public ?CarbonImmutable $dateCreated = null,
        public ?CarbonImmutable $dateCompleted = null,
        public mixed $dateDue = null,
        public ?string $previousTask = null,
        public ?bool $previousTaskComplete = null,
        public ?string $notifyView = null,
        public ?array $attributes = null,
        public array $extra = [],
    ) {}
}
