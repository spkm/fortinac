<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A DebugDatabaseRelation record.
 */
readonly class DebugDatabaseRelation extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $type = null,
        public ?string $leftType = null,
        public ?string $rightType = null,
        public ?int $version = null,
        public ?int $leftID = null,
        public ?int $rightID = null,
        public array $extra = [],
    ) {}
}
