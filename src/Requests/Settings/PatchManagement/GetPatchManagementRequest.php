<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Data\Settings\PatchManagement;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all patch management server records: GET /settings/integration/patch-management.
 */
class GetPatchManagementRequest extends ListRequest
{
    protected ?string $dto = PatchManagement::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/patch-management';
    }
}
