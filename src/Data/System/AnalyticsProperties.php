<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A AnalyticsProperties record.
 */
readonly class AnalyticsProperties extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $analyticsActivationKey = null,
        public ?string $analyticsServer = null,
        public array $extra = [],
    ) {}
}
