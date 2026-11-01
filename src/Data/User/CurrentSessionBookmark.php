<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A CurrentSessionBookmark record.
 */
readonly class CurrentSessionBookmark extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $userDBID = null,
        public ?string $pageUUID = null,
        public array $extra = [],
    ) {}
}
