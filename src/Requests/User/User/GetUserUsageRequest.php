<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this user record: GET /user/{id}/usage.
 */
class GetUserUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/'.$this->id.'/usage';
    }
}
