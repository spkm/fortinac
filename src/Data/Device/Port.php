<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Port record.
 */
readonly class Port extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $legacyDBID = null,
        public ?int $portType = null,
        public ?string $name = null,
        public ?string $portID = null,
        public ?string $displayName = null,
        public ?string $deviceName = null,
        public ?int $deviceID = null,
        public ?int $status = null,
        public ?int $domainID = null,
        public ?string $ip = null,
        public ?string $physAddr = null,
        public ?string $label = null,
        public ?int $connectionState = null,
        public ?string $defaultVlan = null,
        public ?string $currentVlan = null,
        public ?string $currentCli = null,
        public ?string $notes = null,
        public ?string $lastModifiedBy = null,
        public ?string $lastChangeSummary = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?bool $displayable = null,
        public ?string $ifname = null,
        public ?string $ifindex = null,
        public ?string $ifspeed = null,
        public ?string $ifdescr = null,
        public ?int $ifadminStatus = null,
        public ?int $ifoperStatus = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?bool $uplinkDisabled = null,
        public array $extra = [],
    ) {}
}
