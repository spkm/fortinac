<?php

namespace spkm\FortiNac\Data\Policy;

use spkm\FortiNac\Data\Data;

/**
 * A LogicalNetworkConfigurationElementPropertiesByDeviceId record.
 */
readonly class LogicalNetworkConfigurationElementPropertiesByDeviceId extends Data
{
    protected const HIDDEN = ['credentials', 'routerCredentials', 'radiusSecret'];

    /**
     * @param  array<mixed>|null  $vlanNames
     * @param  array<mixed>|null  $vlanIDs
     * @param  array<mixed>|null  $radiusNames
     * @param  array<mixed>|null  $configs
     * @param  array<mixed>|null  $credentials
     * @param  array<mixed>|null  $routerCredentials
     * @param  array<mixed>|null  $defaultConfig
     * @param  array<mixed>|null  $defaultWirelessConfig
     * @param  array<mixed>|null  $registrationConfig
     * @param  array<mixed>|null  $registrationWirelessConfig
     * @param  array<mixed>|null  $remediationConfig
     * @param  array<mixed>|null  $remediationWirelessConfig
     * @param  array<mixed>|null  $authenticationConfig
     * @param  array<mixed>|null  $authenticationWirelessConfig
     * @param  array<mixed>|null  $deadEndConfig
     * @param  array<mixed>|null  $deadEndWirelessConfig
     * @param  array<mixed>|null  $guestConfig
     * @param  array<mixed>|null  $radiusServerConfigs
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?array $vlanNames = null,
        public ?array $vlanIDs = null,
        public ?array $radiusNames = null,
        public ?string $defaultPrimaryRadiusName = null,
        public ?string $defaultSecondaryRadiusName = null,
        public ?array $configs = null,
        public ?array $credentials = null,
        public ?string $cliTimeout = null,
        public ?string $cliConnectTimeout = null,
        public ?array $routerCredentials = null,
        public ?string $vlanFormat = null,
        public ?bool $isClientBasedCLI = null,
        public ?bool $dot1xAutoRegister = null,
        public ?array $defaultConfig = null,
        public ?array $defaultWirelessConfig = null,
        public ?array $registrationConfig = null,
        public ?array $registrationWirelessConfig = null,
        public ?array $remediationConfig = null,
        public ?array $remediationWirelessConfig = null,
        public ?array $authenticationConfig = null,
        public ?array $authenticationWirelessConfig = null,
        public ?array $deadEndConfig = null,
        public ?array $deadEndWirelessConfig = null,
        public ?array $guestConfig = null,
        public ?string $voiceVlanID = null,
        public ?string $chassisIP = null,
        public ?string $chassisSlot = null,
        public ?string $sessionID = null,
        public ?bool $radiusEnabled = null,
        public ?string $radiusMode = null,
        public ?string $radiusSecret = null,
        public ?string $primaryRadiusName = null,
        public ?string $secondaryRadiusName = null,
        public ?int $radiusServerConfigId = null,
        public ?array $radiusServerConfigs = null,
        public ?string $vdom = null,
        public ?bool $portChannelSupport = null,
        public ?bool $usePortChannels = null,
        public ?bool $useSecurePorts = null,
        public ?string $disassociatePort = null,
        public ?bool $manageWebAuthMode = null,
        public ?string $wapDomain = null,
        public ?int $radiusAttributeGroupId = null,
        public ?string $radiusResponseValues = null,
        public ?string $secureUnit1 = null,
        public ?string $securePort1 = null,
        public ?string $secureUnit2 = null,
        public ?string $securePort2 = null,
        public ?bool $applyDefaultToPorts = null,
        public ?string $vpnAddressGroup = null,
        public array $extra = [],
    ) {}
}
