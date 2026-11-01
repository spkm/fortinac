<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A GuestConferenceRegistrationsCount record.
 */
readonly class GuestConferenceRegistrationsCount extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $version = null,
        public ?int $guestID = null,
        public ?CarbonImmutable $startTime = null,
        public ?CarbonImmutable $endTime = null,
        public ?string $userID = null,
        public ?string $sponsor = null,
        public ?string $role = null,
        public ?string $policy = null,
        public ?int $regType = null,
        public ?CarbonImmutable $startTimeOfDay = null,
        public ?CarbonImmutable $endTimeOfDay = null,
        public ?int $daysOfWeek = null,
        public ?int $registrationCount = null,
        public ?CarbonImmutable $startTimeOfDayHours = null,
        public ?CarbonImmutable $endTimeOfDayHours = null,
        public ?CarbonImmutable $startTimeOfDayMinutes = null,
        public ?CarbonImmutable $endTimeOfDayMinutes = null,
        public ?string $timeOfDayString = null,
        public ?string $regTypeString = null,
        public ?string $availability = null,
        public array $extra = [],
    ) {}
}
