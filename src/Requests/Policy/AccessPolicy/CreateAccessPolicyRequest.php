<?php

namespace spkm\FortiNac\Requests\Policy\AccessPolicy;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Access Policy record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/access.
 */
class CreateAccessPolicyRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/access';
    }
}
