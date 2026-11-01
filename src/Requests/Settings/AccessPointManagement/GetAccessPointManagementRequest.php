<?php

namespace spkm\FortiNac\Requests\Settings\AccessPointManagement;

use spkm\FortiNac\Data\Settings\AccessPointManagement;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns the currently configured Properties: GET /settings/device/access-point-management.
 */
class GetAccessPointManagementRequest extends ListRequest
{
    protected ?string $dto = AccessPointManagement::class;

    public function resolveEndpoint(): string
    {
        return '/settings/device/access-point-management';
    }
}
