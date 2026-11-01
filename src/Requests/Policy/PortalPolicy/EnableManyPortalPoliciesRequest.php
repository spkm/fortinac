<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables a list of portal policy records supplied under the id parameter: POST /policy/portal/enable.
 *
 * Parameters: id.
 */
class EnableManyPortalPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/enable';
    }
}
