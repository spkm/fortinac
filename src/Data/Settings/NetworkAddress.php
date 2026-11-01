<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A NetworkAddress record.
 */
readonly class NetworkAddress extends Data
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
        public ?string $startAddress = null,
        public ?string $endAddress = null,
        public ?string $addressLookup = null,
        public ?int $sdnServiceConnectorID = null,
        public ?string $clearpassSPT = null,
        public array $extra = [],
    ) {}
}
