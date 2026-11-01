<?php

namespace spkm\FortiNac\Data\Dynamic;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A FirewallSession record.
 */
readonly class FirewallSession extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $firewall = null,
        public ?string $source = null,
        public ?string $protocol = null,
        public ?string $device = null,
        public ?string $country = null,
        public ?string $countryID = null,
        public ?string $hostname = null,
        public ?string $srcAddr = null,
        public ?string $srcMac = null,
        public ?string $srcPort = null,
        public ?string $destAddr = null,
        public ?string $destMac = null,
        public ?string $destPort = null,
        public ?int $sentBytes = null,
        public ?int $rcvdBytes = null,
        public ?int $sentPackets = null,
        public ?int $rcvdPackets = null,
        public ?CarbonImmutable $addedDate = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public array $extra = [],
    ) {}
}
