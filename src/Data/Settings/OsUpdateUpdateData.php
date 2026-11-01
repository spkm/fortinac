<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A OsUpdateUpdateData record.
 */
readonly class OsUpdateUpdateData extends Data
{
    /**
     * @param  array<mixed>|null  $statusList
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $statusList = null,
        public ?bool $hasUpdate = null,
        public ?bool $hasError = null,
        public ?bool $hasInProgress = null,
        public ?string $status = null,
        public ?bool $upToDate = null,
        public array $extra = [],
    ) {}
}
