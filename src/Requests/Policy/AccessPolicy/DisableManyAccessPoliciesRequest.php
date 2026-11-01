<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the supplied Access Policy: POST /policy/access/disable.
 *
 * Parameters: id.
 */
class DisableManyAccessPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/disable';
    }
}
