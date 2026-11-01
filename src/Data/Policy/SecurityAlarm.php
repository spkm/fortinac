<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SecurityAlarm record.
 */
readonly class SecurityAlarm extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $eventAction
     * @param  array<mixed>|null  $events
     * @param  array<mixed>|null  $activities
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $hostID = null,
        public ?string $hostMac = null,
        public ?CarbonImmutable $eventDate = null,
        public ?string $ruleText = null,
        public ?string $actionText = null,
        public ?array $eventAction = null,
        public ?CarbonImmutable $actionTakenDate = null,
        public ?string $actionTakenBy = null,
        public ?CarbonImmutable $actionUndoneDate = null,
        public ?string $actionUndoneBy = null,
        public ?int $actionEmailGroup = null,
        public ?string $onFailure = null,
        public ?CarbonImmutable $secondaryActionTimer = null,
        public ?array $events = null,
        public ?array $activities = null,
        public ?bool $continueOnFailure = null,
        public ?bool $stopOnFailure = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
