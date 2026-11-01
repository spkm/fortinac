<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AaaServerValidateById record.
 */
readonly class AaaServerValidateById extends Data
{
    /**
     * @param  array<mixed>|null  $dataMap
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $dataMap = null,
        public ?string $jsonString = null,
        public ?string $dataString = null,
        public array $extra = [],
    ) {}
}
