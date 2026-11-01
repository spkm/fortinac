<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information necessary to create an Access Configuration: GET /policy/access-configuration/supporting-info.
 */
class GetAccessConfigurationSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/supporting-info';
    }
}
