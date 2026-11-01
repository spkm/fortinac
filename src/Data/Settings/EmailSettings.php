<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EmailSettings record.
 */
readonly class EmailSettings extends Data
{
    protected const HIDDEN = ['emailPassword'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?CarbonImmutable $smtpTimeout = null,
        public ?CarbonImmutable $smtpConnectionTimeout = null,
        public ?string $emailPassword = null,
        public ?string $emailAuthType = null,
        public ?string $emailPort = null,
        public ?string $emailUsername = null,
        public ?string $emailServer = null,
        public ?string $emailAuth = null,
        public ?string $emailSender = null,
        public ?bool $alwaysSendAsSender = null,
        public array $extra = [],
    ) {}
}
