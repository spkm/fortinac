<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A ServiceConnector record.
 */
readonly class ServiceConnector extends Data
{
    /**
     * @param  array<mixed>|null  $details
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?int $count = null,
        public ?array $details = null,
        public ?string $status = null,
        public array $extra = [],
    ) {}
}
