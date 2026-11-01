<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AaaServer record.
 */
readonly class AaaServer extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $netId = null,
        public ?int $authPort = null,
        public ?int $acctPort = null,
        public ?string $checkUser = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $flrPriority = null,
        public ?bool $localClientDefault = null,
        public ?string $secret = null,
        public ?string $checkPassword = null,
        public array $extra = [],
    ) {}
}
