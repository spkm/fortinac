<?php

namespace spkm\FortiNac\Requests\Settings\MacExclusion;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a Mac Exclusion range: POST /settings/device/mac-exclusion/delete.
 *
 * Parameters: dbid.
 */
class DeleteManyMacExclusionsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/mac-exclusion/delete';
    }
}
