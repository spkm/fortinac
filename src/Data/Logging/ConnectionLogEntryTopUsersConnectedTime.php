<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A ConnectionLogEntryTopUsersConnectedTime record.
 */
readonly class ConnectionLogEntryTopUsersConnectedTime extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $client = null,
        public ?string $ip = null,
        public ?int $port = null,
        public ?string $type = null,
        public ?CarbonImmutable $time = null,
        public ?string $ident = null,
        public ?string $mac = null,
        public ?string $location = null,
        public ?string $logicalNetwork = null,
        public ?string $netID = null,
        public ?string $cliConfigName = null,
        public ?string $sessionID = null,
        public ?bool $isRadius = null,
        public ?string $radiusAttributeDefaultGroup = null,
        public ?string $radiusAttributeLogicalNetworkGroup = null,
        public ?string $enhancedSnapshot = null,
        public ?string $eventType = null,
        public ?int $sessionDuration = null,
        public ?CarbonImmutable $startingTime = null,
        public ?CarbonImmutable $endingTime = null,
        public array $extra = [],
    ) {}
}
