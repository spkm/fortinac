<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EndpointComplianceConfiguration record.
 */
readonly class EndpointComplianceConfiguration extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $agents
     * @param  array<mixed>|null  $actions
     * @param  array<mixed>|null  $scriptProfile
     * @param  array<mixed>|null  $allowedBSSIDGroup
     * @param  array<mixed>|null  $allowedESSIDGroup
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $agentSettings
     * @param  array<mixed>|null  $eventActions
     * @param  array<mixed>|null  $eventActionIDs
     * @param  array<mixed>|null  $profile
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $note = null,
        public ?array $agents = null,
        public ?array $actions = null,
        public ?int $profileID = null,
        public ?array $scriptProfile = null,
        public ?bool $appCollectionEnabled = null,
        public ?string $agentAndroid = null,
        public ?string $agentIOSUnknown = null,
        public ?string $agentIOSIPad = null,
        public ?string $agentIOSIPhone = null,
        public ?string $agentIOSIPod = null,
        public ?string $agentLinux = null,
        public ?string $agentMacOSX = null,
        public ?string $agentWindows = null,
        public ?array $allowedBSSIDGroup = null,
        public ?array $allowedESSIDGroup = null,
        public ?bool $multihomeDetectionEnabled = null,
        public ?bool $legacyActionsEnabled = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $id = null,
        public ?string $scanName = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?array $agentSettings = null,
        public ?array $eventActions = null,
        public ?array $eventActionIDs = null,
        public ?array $profile = null,
        public array $extra = [],
    ) {}
}
