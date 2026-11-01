<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A UserSearch record.
 */
readonly class UserSearch extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?bool $fromDirectory = null,
        public ?User $userRecord = null,
        public array $extra = [],
    ) {}
}
