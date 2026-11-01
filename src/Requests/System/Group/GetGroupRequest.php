<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the group record with the supplied DBID: GET /system/group/{id}.
 */
class GetGroupRequest extends ItemRequest
{
    protected ?string $dto = Group::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id;
    }
}
