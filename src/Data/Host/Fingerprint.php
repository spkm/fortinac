<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Fingerprint record.
 */
readonly class Fingerprint extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $entity
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $source = null,
        public ?string $physAddress = null,
        public ?string $ipAddress = null,
        public ?string $hostName = null,
        public ?string $entityTag = null,
        public ?string $os = null,
        public ?CarbonImmutable $createTime = null,
        public ?CarbonImmutable $lastHeardTime = null,
        public ?array $attributes = null,
        public ?array $entity = null,
        public array $extra = [],
    ) {}
}
