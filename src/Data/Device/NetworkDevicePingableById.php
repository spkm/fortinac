<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A NetworkDevicePingableById record.
 */
readonly class NetworkDevicePingableById extends Data
{
    protected const HIDDEN = ['radiusSecret'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $containerID = null,
        public ?string $name = null,
        public ?string $ipAddress = null,
        public ?string $macAddress = null,
        public ?string $description = null,
        public ?string $note = null,
        public ?string $deviceType = null,
        public ?string $role = null,
        public ?string $incomingEventCategory = null,
        public ?string $incomingEventParser = null,
        public ?bool $statusPolling = null,
        public ?CarbonImmutable $statusPollInterval = null,
        public ?string $ssoAgentType = null,
        public ?int $ibossPort = null,
        public ?string $ibossKey = null,
        public ?string $ibossDomain = null,
        public ?string $ssoCustomScript = null,
        public ?int $paloAltoPort = null,
        public ?string $paloAltoDomain = null,
        public ?bool $paloAltoIntegratedAgent = null,
        public ?string $paloAltoAPIKey = null,
        public ?int $radiusAccountingPort = null,
        public ?string $radiusSecret = null,
        public ?int $ssoGroupID = null,
        public ?string $machineName = null,
        public ?string $department = null,
        public ?string $machineOwner = null,
        public ?string $administrativeContact = null,
        public ?string $geographicalLocation = null,
        public ?string $businessPurpose = null,
        public ?string $bootpAddress = null,
        public ?string $printQueue = null,
        public array $extra = [],
    ) {}
}
