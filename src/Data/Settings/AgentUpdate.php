<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AgentUpdate record.
 */
readonly class AgentUpdate extends Data
{
    /**
     * @param  array<mixed>|null  $winAgents
     * @param  array<mixed>|null  $macAgents
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $winUUID = null,
        public ?string $macUUID = null,
        public ?bool $updateWindowsEnabled = null,
        public ?bool $updateMacEnabled = null,
        public ?bool $allowDowngrade = null,
        public ?string $maxUpdateAttempts = null,
        public ?array $winAgents = null,
        public ?array $macAgents = null,
        public array $extra = [],
    ) {}
}
