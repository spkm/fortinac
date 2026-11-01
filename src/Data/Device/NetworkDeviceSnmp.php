<?php

namespace spkm\FortiNac\Data\Device;

use spkm\FortiNac\Data\Data;

/**
 * A NetworkDeviceSnmp record.
 */
readonly class NetworkDeviceSnmp extends Data
{
    protected const HIDDEN = ['snmpAuthenticationPassword', 'snmpPrivacyPassword', 'cliCredentials'];

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
        public array $extra = [],
    ) {}
}
