<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A SessionTimeout record.
 */
readonly class SessionTimeout extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $timeout = null,
        public array $extra = [],
    ) {}
}
