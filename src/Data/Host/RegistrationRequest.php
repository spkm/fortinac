<?php

namespace spkm\FortiNac\Data\Host;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RegistrationRequest record.
 */
readonly class RegistrationRequest extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $approver = null,
        public ?string $ip = null,
        public ?string $mac = null,
        public ?string $location = null,
        public ?string $state = null,
        public ?CarbonImmutable $createDate = null,
        public ?CarbonImmutable $expireDate = null,
        public ?CarbonImmutable $responseDate = null,
        public ?string $userID = null,
        public ?string $requestKey = null,
        public ?string $requestSource = null,
        public ?string $requestSourceName = null,
        public ?int $approverGroup = null,
        public array $extra = [],
    ) {}
}
