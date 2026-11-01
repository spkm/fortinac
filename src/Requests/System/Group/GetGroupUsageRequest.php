<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of group records that reference this record: GET /system/group/{id}/usage.
 */
class GetGroupUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id.'/usage';
    }
}
