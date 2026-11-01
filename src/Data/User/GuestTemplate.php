<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A GuestTemplate record.
 */
readonly class GuestTemplate extends Data
{
    protected const HIDDEN = ['passwordLength', 'passwordExclusions', 'sendPasswordSeparately'];

    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $weeklySchedule
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $name = null,
        public ?int $visitorType = null,
        public ?bool $canSendEmail = null,
        public ?bool $canSendSMS = null,
        public ?string $role = null,
        public ?string $policy = null,
        public ?int $userNameFormat = null,
        public ?int $passwordLength = null,
        public ?int $reauthenticationPeriod = null,
        public ?string $aupURL = null,
        public ?string $aupIP = null,
        public ?string $successURL = null,
        public ?string $successIP = null,
        public ?string $passwordExclusions = null,
        public ?string $dataFields = null,
        public ?string $state = null,
        public ?int $version = null,
        public ?int $authType = null,
        public ?int $authServer = null,
        public ?int $regType = null,
        public ?array $weeklySchedule = null,
        public ?bool $terminateAtEndOfDay = null,
        public ?string $printedNote = null,
        public ?CarbonImmutable $maxConferenceAttendees = null,
        public ?int $accountDuration = null,
        public ?bool $accountDurationFromLogin = null,
        public ?bool $ncmPropagateHosts = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?bool $sendPasswordSeparately = null,
        public ?string $authTypeName = null,
        public ?string $loginAvail = null,
        public ?string $loginAvailJSON = null,
        public ?string $visitorTypeName = null,
        public array $extra = [],
    ) {}
}
