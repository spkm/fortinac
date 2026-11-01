<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A MessagingGateway record.
 */
readonly class MessagingGateway extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $liveObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $protocol = null,
        public ?string $gatewayAddress = null,
        public ?string $country = null,
        public ?int $maxMessageLength = null,
        public mixed $prefix = null,
        public mixed $suffix = null,
        public ?string $yamsEventTag = null,
        public ?string $auditObj = null,
        public ?bool $enabled = null,
        public ?string $user = null,
        public ?string $action = null,
        public ?CarbonImmutable $timestamp = null,
        public ?array $liveObj = null,
        public ?int $auditDBID = null,
        public ?int $liveDBID = null,
        public array $extra = [],
    ) {}
}
