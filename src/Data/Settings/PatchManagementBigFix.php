<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A PatchManagementBigFix record.
 */
readonly class PatchManagementBigFix extends Data
{
    protected const HIDDEN = ['bigFixPassword'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $ip = null,
        public ?string $status = null,
        public ?CarbonImmutable $pollingInterval = null,
        public ?string $img = null,
        public ?string $bigFixName = null,
        public ?int $bigFixPort = null,
        public ?string $bigFixUser = null,
        public ?string $bigFixPassword = null,
        public array $extra = [],
    ) {}
}
