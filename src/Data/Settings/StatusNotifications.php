<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A StatusNotifications record.
 */
readonly class StatusNotifications extends Data
{
    /**
     * @param  array<mixed>|null  $attrNames
     * @param  array<mixed>|null  $attrValues
     * @param  array<mixed>|null  $DISABLED
     * @param  array<mixed>|null  $LOGGED_ON
     * @param  array<mixed>|null  $PENDING_AT_RISK
     * @param  array<mixed>|null  $DISCONNECTED
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $attrNames = null,
        public ?array $attrValues = null,
        public ?array $DISABLED = null,
        public ?array $LOGGED_ON = null,
        public ?array $PENDING_AT_RISK = null,
        public ?array $DISCONNECTED = null,
        public array $extra = [],
    ) {}
}
