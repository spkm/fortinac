<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AdminProfile record.
 */
readonly class AdminProfile extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $permissions
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?bool $administrator = null,
        public ?bool $isKioskMode = null,
        public ?bool $global = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?CarbonImmutable $inactivityTime = null,
        public ?string $schedule = null,
        public ?int $kioskTemplateID = null,
        public ?string $kioskWelcomeMessage = null,
        public ?string $note = null,
        public ?string $landingPage = null,
        public ?bool $manageByGroups = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?bool $preventAging = null,
        public ?bool $upgradePermissions = null,
        public ?int $lockoutThreshold = null,
        public ?int $lockoutDuration = null,
        public ?array $permissions = null,
        public ?string $ncmLandingPage = null,
        public ?string $scheduleStr = null,
        public array $extra = [],
    ) {}
}
