<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A User record.
 */
readonly class User extends Data
{
    protected const HIDDEN = ['apiAccessToken', 'password', 'passwordFromRaw', 'hashedPassword'];

    /**
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $locale
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $currentEnvironment
     * @param  array<mixed>|null  $creationEvent
     * @param  array<mixed>|null  $destroyEvent
     * @param  array<mixed>|null  $establishedEvent
     * @param  array<mixed>|null  $lostEvent
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $role = null,
        public ?string $directoryPolicyValue = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $dn = null,
        public ?string $position = null,
        public ?string $email = null,
        public mixed $state = null,
        public ?string $userID = null,
        public ?int $status = null,
        public ?string $notes = null,
        public ?string $language = null,
        public ?string $country = null,
        public ?float $version = null,
        public ?float $packedVersion = null,
        public ?CarbonImmutable $creationTime = null,
        public ?CarbonImmutable $validForTime = null,
        public ?CarbonImmutable $validForInactivityDays = null,
        public ?CarbonImmutable $validForInactivityAgeTime = null,
        public ?CarbonImmutable $lastActivityTime = null,
        public ?string $address = null,
        public ?string $city = null,
        public ?string $mailState = null,
        public ?string $zipCode = null,
        public ?string $phone = null,
        public ?string $organization = null,
        public ?string $organizationalUnit = null,
        public mixed $type = null,
        public ?int $adminProfileId = null,
        public ?int $guestId = null,
        public ?string $mobileNumber = null,
        public ?string $mobileProvider = null,
        public ?bool $ncmPropagateHosts = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?bool $isApiAdmin = null,
        public ?string $apiAccessToken = null,
        public ?string $trustedHosts = null,
        public ?bool $localMschapAuth = null,
        public ?int $maxAllowedHosts = null,
        public ?string $password = null,
        public ?array $attributes = null,
        public ?bool $guestContractor = null,
        public ?array $locale = null,
        public ?bool $adminUser = null,
        public ?CarbonImmutable $validTime = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $addAuditSummary = null,
        public ?array $currentEnvironment = null,
        public ?bool $deleteHostsUponExpiration = null,
        public ?string $iconType = null,
        public ?bool $disabled = null,
        public ?bool $directoryDisabled = null,
        public ?bool $apiAdmin = null,
        public ?bool $superUser = null,
        public ?CarbonImmutable $validForTimeMS = null,
        public ?string $passwordFromRaw = null,
        public ?bool $userAdministrator = null,
        public ?bool $userOperator = null,
        public ?bool $userHelpDesk = null,
        public ?bool $userAdministrative = null,
        public ?string $hashedPassword = null,
        public ?array $creationEvent = null,
        public ?array $destroyEvent = null,
        public ?array $establishedEvent = null,
        public ?array $lostEvent = null,
        public ?string $name = null,
        public array $extra = [],
    ) {}
}
