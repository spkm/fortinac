<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AgentProperties record.
 */
readonly class AgentProperties extends Data
{
    protected const HIDDEN = ['passwordLabel'];

    /**
     * @param  array<mixed>|null  $requireConnectedAdapter
     * @param  array<mixed>|null  $hostGroups
     * @param  array<mixed>|null  $result
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $vmDetection = null,
        public ?string $onConnectHostGroup = null,
        public ?array $requireConnectedAdapter = null,
        public ?string $expirationEnabled = null,
        public ?string $expirationTime = null,
        public ?string $networkChangeMsg = null,
        public ?string $invalidOUIMsg = null,
        public ?string $failedReg = null,
        public ?string $failedScan = null,
        public ?string $warnMsg = null,
        public ?string $successReg = null,
        public ?string $reAuthPrompt = null,
        public ?string $loginPrompt = null,
        public ?string $userNameLabel = null,
        public ?string $passwordLabel = null,
        public ?string $displayNotifications = null,
        public ?string $secondaryHostName = null,
        public ?string $hostConnectGracePeriod = null,
        public ?string $agentDisconnectGracePeriod = null,
        public ?string $hostDisconnectGracePeriod = null,
        public ?string $connectExternalHostsGroup = null,
        public ?string $header = null,
        public ?string $footer = null,
        public ?string $cacheStrategy = null,
        public ?string $cacheStrategyPollInterval = null,
        public ?string $cacheStrategyExpireTime = null,
        public ?string $remediationMsg = null,
        public ?string $paConfigForHA = null,
        public ?string $showExpiration = null,
        public ?string $hostName = null,
        public ?array $hostGroups = null,
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?array $result = null,
        public array $extra = [],
    ) {}
}
