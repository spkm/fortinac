<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A HostHealthHistory record.
 */
readonly class HostHealthHistory extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $result = null,
        public ?CarbonImmutable $date = null,
        public ?string $profile = null,
        public array $extra = [],
    ) {}
}
