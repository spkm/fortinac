<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A PaPacketTransportConfig record.
 */
readonly class PaPacketTransportConfig extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $id = null,
        public ?string $name = null,
        public ?int $port = null,
        public ?int $tlsConfigID = null,
        public ?bool $enabled = null,
        public ?string $transportType = null,
        public ?int $maxPacketQueueSize = null,
        public ?string $bindToAddress = null,
        public ?CarbonImmutable $writeIdleTimeout = null,
        public ?CarbonImmutable $readIdleTimeout = null,
        public ?bool $useNativeTransport = null,
        public ?int $maxConcurrentConnections = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public mixed $GUID = null,
        public ?string $tlsConfigName = null,
        public ?int $gUID = null,
        public array $extra = [],
    ) {}
}
