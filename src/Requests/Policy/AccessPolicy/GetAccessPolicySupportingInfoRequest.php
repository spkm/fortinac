<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information necessary to create an Access Policy: GET /policy/access/supporting-info.
 */
class GetAccessPolicySupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/supporting-info';
    }
}
