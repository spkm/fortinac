<?php

namespace spkm\FortiNac\Data\User;

use spkm\FortiNac\Data\Data;

/**
 * A Dashboard record.
 */
readonly class Dashboard extends Data
{
    /**
     * @param  array<mixed>|null  $dashboard
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?bool $canDelete = null,
        public ?string $label = null,
        public ?int $userDBID = null,
        public ?array $dashboard = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
