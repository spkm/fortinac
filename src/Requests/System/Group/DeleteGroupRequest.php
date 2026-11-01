<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the group record supplied, if it is not currently in use: DELETE /system/group/{id}.
 */
class DeleteGroupRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->id;
    }
}
