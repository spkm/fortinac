<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A ScannedApplication record.
 */
readonly class ScannedApplication extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $packageName = null,
        public ?string $appVersion = null,
        public ?string $vendor = null,
        public ?string $os = null,
        public ?string $md5 = null,
        public ?string $sha1 = null,
        public ?string $sha256 = null,
        public ?int $threatScore = null,
        public ?int $threatOverride = null,
        public ?CarbonImmutable $submitDate = null,
        public ?string $source = null,
        public ?int $verificationEngine = null,
        public ?string $osversion = null,
        public ?string $checksum = null,
        public ?string $checksumMethod = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
