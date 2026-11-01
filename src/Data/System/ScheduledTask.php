<?php

namespace spkm\FortiNac\Data\System;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A ScheduledTask record.
 */
readonly class ScheduledTask extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $description
     * @param  array<mixed>|null  $internalObject
     * @param  array<mixed>|null  $multyDay
     * @param  array<mixed>|null  $scheduledTaskEvent
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $eventTag = null,
        public ?string $type = null,
        public ?bool $hidden = null,
        public ?array $description = null,
        public ?array $internalObject = null,
        public ?string $taskTag = null,
        public ?array $multyDay = null,
        public ?array $scheduledTaskEvent = null,
        public ?int $period = null,
        public ?CarbonImmutable $previousScheduledTime = null,
        public ?CarbonImmutable $scheduledTime = null,
        public ?bool $pause = null,
        public ?string $name = null,
        public ?string $state = null,
        public ?int $id = null,
        public ?int $landscape = null,
        public ?int $version = null,
        public array $extra = [],
    ) {}
}
