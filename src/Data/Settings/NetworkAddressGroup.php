<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A NetworkAddressGroup record.
 */
readonly class NetworkAddressGroup extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $addresses
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?array $addresses = null,
        public array $extra = [],
    ) {}
}
