<?php

namespace spkm\FortiNac\Requests\Policy\PortalPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Portal Policy: POST /policy/portal/disable.
 *
 * Parameters: id.
 */
class DisableManyPortalPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/portal/disable';
    }
}
