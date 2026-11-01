<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Aging record.
 */
readonly class Aging extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?CarbonImmutable $registeredHostValidTime = null,
        public ?CarbonImmutable $registeredHostInactiveTime = null,
        public ?int $unregHostValidTime = null,
        public ?int $unregHostInactiveTime = null,
        public ?CarbonImmutable $userValidTime = null,
        public ?CarbonImmutable $userInactiveTime = null,
        public ?bool $deleteRegHostsWithUser = null,
        public array $extra = [],
    ) {}
}
