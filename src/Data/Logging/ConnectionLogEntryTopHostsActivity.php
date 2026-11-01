<?php

namespace spkm\FortiNac\Data\Logging;

use spkm\FortiNac\Data\Data;

/**
 * A ConnectionLogEntryTopHostsActivity record.
 */
readonly class ConnectionLogEntryTopHostsActivity extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $mac = null,
        public ?string $owner = null,
        public ?string $host = null,
        public ?string $type = null,
        public ?int $count = null,
        public array $extra = [],
    ) {}
}
