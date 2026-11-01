<?php

namespace spkm\FortiNac\Data\Radius;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RadiusHealth record.
 */
readonly class RadiusHealth extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $groupId = null,
        public ?string $reply = null,
        public ?int $count = null,
        public ?string $message = null,
        public ?int $duration = null,
        public ?CarbonImmutable $date = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public array $extra = [],
    ) {}
}
