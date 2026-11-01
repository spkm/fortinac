<?php

namespace spkm\FortiNac\Requests\Settings\MacExclusion;

use spkm\FortiNac\Data\Settings\MacExclusion;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a Mac Exclusion range: POST /settings/device/mac-exclusion.
 *
 * Parameters: startMac, endMac, dbid.
 */
class CreateMacExclusionRequest extends ActionRequest
{
    protected ?string $dto = MacExclusion::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/mac-exclusion';
    }
}
