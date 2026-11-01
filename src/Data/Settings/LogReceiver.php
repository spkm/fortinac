<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A LogReceiver record.
 */
readonly class LogReceiver extends Data
{
    /**
     * @param  array<mixed>|null  $logHost
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $logHost = null,
        public ?int $dbid = null,
        public array $extra = [],
    ) {}
}
