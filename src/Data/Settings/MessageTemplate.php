<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A MessageTemplate record.
 */
readonly class MessageTemplate extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $subject = null,
        public ?string $message = null,
        public array $extra = [],
    ) {}
}
