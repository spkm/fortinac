<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Guest record.
 */
readonly class Guest extends Data
{
    /**
     * @param  array<mixed>|null  $weeklySchedule
     * @param  array<mixed>|null  $clientIds
     * @param  array<mixed>|null  $clientIDs
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?int $clientID = null,
        public ?string $role = null,
        public ?string $policy = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $sponsor = null,
        public ?int $visitorType = null,
        public ?string $assetTag = null,
        public ?string $email = null,
        public ?string $userID = null,
        public ?string $password = null,
        public ?CarbonImmutable $creationTime = null,
        public ?CarbonImmutable $validForTime = null,
        public ?string $address = null,
        public ?string $city = null,
        public ?string $mailState = null,
        public ?string $zipCode = null,
        public ?string $phone = null,
        public ?string $country = null,
        public ?string $reason = null,
        public ?string $personVisiting = null,
        public ?bool $canSendEmail = null,
        public ?bool $canSendSMS = null,
        public ?string $aupURL = null,
        public ?string $aupIP = null,
        public ?string $successURL = null,
        public ?string $successIP = null,
        public ?int $reauthenticationPeriod = null,
        public ?bool $accountEnabled = null,
        public ?string $dataFields = null,
        public ?int $authType = null,
        public ?int $authServer = null,
        public ?int $regType = null,
        public ?array $weeklySchedule = null,
        public ?string $printedNote = null,
        public ?array $clientIds = null,
        public ?CarbonImmutable $numConferenceAttendees = null,
        public ?string $mobileProvider = null,
        public ?string $mobileNumber = null,
        public ?string $conferenceName = null,
        public ?int $accountDuration = null,
        public ?bool $ncmPropagateHosts = null,
        public ?string $passwordExclusions = null,
        public ?bool $sendPasswordSeparately = null,
        public ?int $minPwLength = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?string $authTypeName = null,
        public ?string $loginAvailabilityString = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?int $landscape = null,
        public ?string $state = null,
        public ?int $version = null,
        public ?int $packedVersion = null,
        public ?bool $terminateAtEndOfDay = null,
        public ?string $userStartTimeStr = null,
        public ?string $userEndTimeStr = null,
        public ?string $encodedPassword = null,
        public ?bool $startTimeOfDayAM = null,
        public ?bool $endTimeOfDayAM = null,
        public ?CarbonImmutable $startTimeOfDayHours = null,
        public ?CarbonImmutable $endTimeOfDayHours = null,
        public ?CarbonImmutable $startTimeOfDayMinutes = null,
        public ?CarbonImmutable $endTimeOfDayMinutes = null,
        public ?string $timeOfDayString = null,
        public ?string $daysOfWeekString = null,
        public ?bool $guestValid = null,
        public ?CarbonImmutable $userStartTime = null,
        public ?CarbonImmutable $userEndTime = null,
        public ?bool $conference = null,
        public ?bool $individualUserName = null,
        public ?bool $sharedUserName = null,
        public ?array $clientIDs = null,
        public ?CarbonImmutable $startTimeOfDay = null,
        public ?CarbonImmutable $endTimeOfDay = null,
        public ?int $daysOfWeek = null,
        public ?bool $alwaysOn = null,
        public ?CarbonImmutable $creationTimeMillis = null,
        public ?CarbonImmutable $validForTimeMillis = null,
        public array $extra = [],
    ) {}
}
