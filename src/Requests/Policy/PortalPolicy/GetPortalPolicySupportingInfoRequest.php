<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information used to create portal policies: GET /policy/portal/supporting-info.
 */
class GetPortalPolicySupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/supporting-info';
    }
}
