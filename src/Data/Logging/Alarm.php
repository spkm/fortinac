<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Alarm record.
 */
readonly class Alarm extends Data
{
    /**
     * @param  array<mixed>|null  $eventIDs
     * @param  array<mixed>|null  $triggerRuleType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?int $state = null,
        public ?string $name = null,
        public ?int $elementType = null,
        public ?int $elementID = null,
        public ?string $elementName = null,
        public ?int $severity = null,
        public ?CarbonImmutable $timeOfAlarm = null,
        public mixed $timeAcknowledged = null,
        public ?array $eventIDs = null,
        public ?float $version = null,
        public ?int $numEventID = null,
        public ?CarbonImmutable $time = null,
        public ?bool $empty = null,
        public ?array $triggerRuleType = null,
        public ?string $nameLabel = null,
        public ?string $probableCause = null,
        public array $extra = [],
    ) {}
}
