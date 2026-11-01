<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AlarmStartAlarmMonitor record.
 */
readonly class AlarmStartAlarmMonitor extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $name = null,
        public ?string $elementType = null,
        public ?int $elementID = null,
        public ?string $elementName = null,
        public ?string $message = null,
        public ?CarbonImmutable $timeOfEvent = null,
        public ?int $version = null,
        public ?string $eventFormatString = null,
        public ?CarbonImmutable $time = null,
        public ?bool $empty = null,
        public array $extra = [],
    ) {}
}
