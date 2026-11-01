<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A NetworkDeviceSnmpById record.
 */
readonly class NetworkDeviceSnmpById extends Data
{
    /**
     * @param  array<mixed>|null  $snmpSecurityStrings
     * @param  array<mixed>|null  $cliCredentials
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $containerID = null,
        public ?string $ipAddress = null,
        public ?string $snmpProtocol = null,
        public ?array $snmpSecurityStrings = null,
        public ?string $snmpUsername = null,
        public ?string $snmpAuthenticationProtocol = null,
        public ?string $snmpAuthenticationPassword = null,
        public ?string $snmpPrivacyProtocol = null,
        public ?string $snmpPrivacyPassword = null,
        public ?array $cliCredentials = null,
        public ?bool $vlanSwitchingEnabled = null,
        public ?bool $paOptimzationEnabled = null,
        public ?bool $macFilteringEnabled = null,
        public ?string $role = null,
        public ?string $description = null,
        public ?string $note = null,
        public ?bool $manageAsGenericSNMP = null,
        public ?bool $readL2L3UsingSNMP = null,
        public ?string $deviceTypeOverride = null,
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
        public ?string $systemName = null,
        public ?string $contactName = null,
        public ?string $deviceLocation = null,
        public ?bool $contactPollingEnabled = null,
        public ?CarbonImmutable $contactPollingInterval = null,
        public ?bool $l2PollingEnabled = null,
        public ?CarbonImmutable $l2PollingInterval = null,
        public ?bool $l3PollingEnabled = null,
        public ?CarbonImmutable $l3PollingInterval = null,
        public ?CarbonImmutable $l3PollingPriority = null,
        public ?bool $cdpPollingEnabled = null,
        public ?CarbonImmutable $cdpPollingInterval = null,
        public array $extra = [],
    ) {}
}
