<?php

namespace spkm\FortiNac\Requests\System\Group;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the User, Host, and Port groups that may be managed by members of this group: POST /system/group/{groupID}/manages.
 */
class PostGroupManagesRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $groupId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.$this->groupId.'/manages';
    }
}
