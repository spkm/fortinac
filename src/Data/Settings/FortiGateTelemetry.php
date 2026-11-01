<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A FortiGateTelemetry record.
 */
readonly class FortiGateTelemetry extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $id = null,
        public ?string $ip = null,
        public ?int $port = null,
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
