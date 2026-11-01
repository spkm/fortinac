<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A FirewallTag record.
 */
readonly class FirewallTag extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $categories
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?CarbonImmutable $lastModifiedDateMilliseconds = null,
        public ?int $id = null,
        public ?string $name = null,
        public ?array $categories = null,
        public array $extra = [],
    ) {}
}
