<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A ScanResult record.
 */
readonly class ScanResult extends Data
{
    /**
     * @param  array<mixed>|null  $macs
     * @param  array<mixed>|null  $tests
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $userID = null,
        public ?string $hostName = null,
        public ?string $policy = null,
        public ?string $location = null,
        public ?int $status = null,
        public ?int $type = null,
        public ?int $version = null,
        public ?CarbonImmutable $testTime = null,
        public ?string $state = null,
        public ?array $macs = null,
        public ?array $tests = null,
        public ?string $epcconfigName = null,
        public ?string $operatingSystem = null,
        public ?string $applications = null,
        public array $extra = [],
    ) {}
}
