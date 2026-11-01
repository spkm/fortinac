<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A GroupMembers record.
 */
readonly class GroupMembers extends Data
{
    /**
     * @param  array<mixed>|null  $subgroups
     * @param  array<mixed>|null  $members
     * @param  array<mixed>|null  $imgHash
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $subgroups = null,
        public ?array $members = null,
        public ?string $name = null,
        public ?array $imgHash = null,
        public array $extra = [],
    ) {}
}
