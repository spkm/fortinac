<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A VendorOui record.
 */
readonly class VendorOui extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $vendorCode = null,
        public ?string $vendorName = null,
        public ?string $vendorAlias = null,
        public ?string $description = null,
        public ?string $role = null,
        public ?string $registrationType = null,
        public ?string $userRegistrationType = null,
        public array $extra = [],
    ) {}
}
