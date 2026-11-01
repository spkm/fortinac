<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Data\Settings\PatchManagementBigFix;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Test BigFix Server connection: POST /settings/integration/patch-management/test.
 */
class TestPatchManagementRequest extends WriteRequest
{
    protected ?string $dto = PatchManagementBigFix::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/patch-management/test';
    }
}
