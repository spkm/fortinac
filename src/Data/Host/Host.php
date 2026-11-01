<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Host record.
 */
readonly class Host extends Data
{
    /**
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $adapters
     * @param  array<mixed>|null  $reValidationAction
     * @param  array<mixed>|null  $policyHints
     * @param  array<mixed>|null  $adapterObjects
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $currentEnvironment
     * @param  array<mixed>|null  $connectedAdapter
     * @param  array<mixed>|null  $creationEvent
     * @param  array<mixed>|null  $destroyEvent
     * @param  array<mixed>|null  $establishedEvent
     * @param  array<mixed>|null  $lostEvent
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $notes = null,
        public ?int $version = null,
        public ?CarbonImmutable $creationTime = null,
        public ?CarbonImmutable $validForTime = null,
        public ?CarbonImmutable $lastSuccessfulPoll = null,
        public ?string $applications = null,
        public ?string $hostName = null,
        public ?string $owner = null,
        public ?string $policy = null,
        public ?string $hardwareType = null,
        public ?int $status = null,
        public ?string $patchManagementVendor = null,
        public ?string $patchManagementID = null,
        public ?array $attributes = null,
        public ?array $adapters = null,
        public ?string $role = null,
        public ?string $type = null,
        public ?string $directoryPolicyValue = null,
        public ?string $agentVersion = null,
        public ?string $agentID = null,
        public ?string $agentSN = null,
        public ?string $agentTag = null,
        public ?string $agentPlatform = null,
        public ?string $iconType = null,
        public ?bool $reValidation = null,
        public ?string $criticality = null,
        public ?int $reValidationInterval = null,
        public ?int $lastReValidation = null,
        public ?string $openPorts = null,
        public ?array $reValidationAction = null,
        public ?int $domainId = null,
        public ?string $loggedOnUserId = null,
        public ?array $policyHints = null,
        public ?bool $managedByMDM = null,
        public ?bool $mdmCompromised = null,
        public ?bool $mdmCompliance = null,
        public ?bool $mdmDataProtection = null,
        public ?bool $mdmPasscodePresent = null,
        public ?bool $inTopology = null,
        public ?string $adaptersAsString = null,
        public ?string $ip = null,
        public ?CarbonImmutable $validForTimeOffline = null,
        public ?bool $atRisk = null,
        public ?bool $notCommunicatingPersistentAgent = null,
        public ?bool $persistentAgent = null,
        public ?bool $notAuthenticated = null,
        public ?bool $userLoggedOn = null,
        public ?bool $vpnclient = null,
        public ?string $typeLabel = null,
        public ?string $primaryMac = null,
        public ?array $adapterObjects = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $addAuditSummary = null,
        public ?array $currentEnvironment = null,
        public ?string $operatingSystem = null,
        public ?CarbonImmutable $offlineAgeTime = null,
        public ?string $pcserialNumber = null,
        public ?int $vulnerabilityScanStatus = null,
        public ?CarbonImmutable $vulnerabilityScanDate = null,
        public ?array $connectedAdapter = null,
        public ?string $adapterIpAsString = null,
        public ?string $adapterLocation = null,
        public ?string $adapterContainerAsString = null,
        public ?bool $pendingAtRisk = null,
        public ?bool $disabled = null,
        public ?string $agentPlatformEnum = null,
        public ?CarbonImmutable $validTime = null,
        public ?bool $expired = null,
        public ?bool $directoryDisabled = null,
        public ?bool $scanOnConnect = null,
        public ?bool $scanned = null,
        public ?bool $dialUpClient = null,
        public ?bool $messageReceiver = null,
        public ?bool $connected = null,
        public ?array $creationEvent = null,
        public ?array $destroyEvent = null,
        public ?array $establishedEvent = null,
        public ?array $lostEvent = null,
        public ?string $name = null,
        public ?CarbonImmutable $validForTimeInLong = null,
        public array $extra = [],
    ) {}
}
