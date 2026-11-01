<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SecurityEvent record.
 */
readonly class SecurityEvent extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?CarbonImmutable $eventDate = null,
        public ?int $deviceID = null,
        public ?string $sourceIP = null,
        public ?string $sourceMac = null,
        public ?string $destinationIP = null,
        public ?string $destinationMac = null,
        public ?string $alertType = null,
        public ?string $subtype = null,
        public ?int $severity = null,
        public ?string $threatID = null,
        public ?string $eventDescription = null,
        public ?string $sourceLocation = null,
        public ?string $destinationLocation = null,
        public ?string $vendor = null,
        public ?array $attributes = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
