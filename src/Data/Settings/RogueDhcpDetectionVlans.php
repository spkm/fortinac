<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A RogueDhcpDetectionVlans record.
 */
readonly class RogueDhcpDetectionVlans extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $vlanID = null,
        public ?string $vlanName = null,
        public ?int $dbid = null,
        public array $extra = [],
    ) {}
}
