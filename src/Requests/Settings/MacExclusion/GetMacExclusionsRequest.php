<?php

namespace spkm\FortiNac\Requests\Settings\MacExclusion;

use spkm\FortiNac\Data\Settings\MacExclusion;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the currently configured Mac Exclusion Ranges: GET /settings/device/mac-exclusion.
 */
class GetMacExclusionsRequest extends ListRequest
{
    protected ?string $dto = MacExclusion::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/mac-exclusion';
    }
}
