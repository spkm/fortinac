<?php

namespace spkm\FortiNac\Data\User;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SelfRegistration record.
 */
readonly class SelfRegistration extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $sponsor = null,
        public ?string $ip = null,
        public ?string $mac = null,
        public ?string $location = null,
        public ?string $guestData = null,
        public ?CarbonImmutable $createDate = null,
        public ?CarbonImmutable $expireDate = null,
        public ?CarbonImmutable $responseDate = null,
        public ?string $message = null,
        public ?string $userID = null,
        public ?int $guestDBID = null,
        public ?string $requestKey = null,
        public ?string $portalName = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?bool $expired = null,
        public ?bool $pending = null,
        public ?string $stateType = null,
        public ?string $stateDisplayValue = null,
        public ?string $formattedSponsorString = null,
        public array $extra = [],
    ) {}
}
