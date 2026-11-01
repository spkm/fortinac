<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EventAlarmMapping record.
 */
readonly class EventAlarmMapping extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $alarmAction
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $notifyGroup
     * @param  array<mixed>|null  $rule
     * @param  array<mixed>|null  $elementTypeAuditType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $alarmName = null,
        public ?string $eventName = null,
        public ?string $clearEventName = null,
        public ?int $severity = null,
        public ?string $elementType = null,
        public ?int $elementID = null,
        public ?int $notifyGroupID = null,
        public ?array $alarmAction = null,
        public ?bool $paused = null,
        public ?int $version = null,
        public ?string $scriptName = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $modifyAuditSummary = null,
        public ?string $addAuditSummary = null,
        public ?array $notifyGroup = null,
        public ?array $rule = null,
        public ?array $elementTypeAuditType = null,
        public ?bool $sendEmail = null,
        public ?bool $sendSMS = null,
        public ?bool $log = null,
        public array $extra = [],
    ) {}
}
