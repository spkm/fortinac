<?php

namespace spkm\FortiNac\Requests\Policy\UserHostProfile;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this User/Host Profile record: GET /policy/user-host-profile/{id}/usage.
 */
class GetUserHostProfileUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/user-host-profile/'.$this->id.'/usage';
    }
}
