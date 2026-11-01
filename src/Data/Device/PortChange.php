<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A PortChange record.
 */
readonly class PortChange extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?CarbonImmutable $time = null,
        public ?string $state = null,
        public ?string $status = null,
        public ?string $vlan = null,
        public ?string $cli = null,
        public ?string $roleName = null,
        public ?int $version = null,
        public ?string $cliname = null,
        public ?int $portId = null,
        public array $extra = [],
    ) {}
}
