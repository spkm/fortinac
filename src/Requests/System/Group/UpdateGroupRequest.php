<?php

namespace spkm\FortiNac\Requests\System\Group;

use JsonSerializable;
use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Requests\WriteRequest;
use spkm\FortiNac\Support\Path;

/**
 * Adds a new user group to the database: POST /system/group/{groupType}.
 */
class UpdateGroupRequest extends WriteRequest
{
    protected ?string $dto = Group::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupType, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.Path::segment($this->groupType);
    }
}
