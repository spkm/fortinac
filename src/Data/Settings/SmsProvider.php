<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A SmsProvider record.
 */
readonly class SmsProvider extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $providerName = null,
        public ?string $emailToSMS = null,
        public ?string $country = null,
        public mixed $state = null,
        public ?bool $enabled = null,
        public ?float $version = null,
        public ?int $maxMessageLength = null,
        public array $extra = [],
    ) {}
}
