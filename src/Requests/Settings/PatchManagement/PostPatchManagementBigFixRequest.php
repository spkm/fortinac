<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Data\Settings\PatchManagementBigFix;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new BigFix Patch Management server: POST /settings/integration/patch-management/big-fix.
 */
class PostPatchManagementBigFixRequest extends WriteRequest
{
    protected ?string $dto = PatchManagementBigFix::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/patch-management/big-fix';
    }
}
