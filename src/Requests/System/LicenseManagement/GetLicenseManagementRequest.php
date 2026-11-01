<?php

namespace spkm\FortiNac\Requests\System\LicenseManagement;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the License information: GET /system/license-management.
 *
 * Parameters: deviceIP, deviceProxy.
 */
class GetLicenseManagementRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: deviceIP, deviceProxy
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/license-management';
    }
}
