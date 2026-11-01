<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Access Policy: POST /policy/access/enable.
 *
 * Parameters: id.
 */
class EnableManyAccessPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access/enable';
    }
}
