<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the policy info for a user based on the provided user it: GET /user/{id}/get-policy.
 */
class GetUserGetPolicyRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/'.$this->id.'/get-policy';
    }
}
