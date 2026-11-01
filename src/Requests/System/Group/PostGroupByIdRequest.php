<?php

namespace spkm\FortiNac\Requests\System\Group;

use JsonSerializable;
use spkm\FortiNac\Data\System\Group;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing user group in the database: POST /system/group/{groupType}/{id}.
 */
class PostGroupByIdRequest extends WriteRequest
{
    protected ?string $dto = Group::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupType, protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/group/'.rawurlencode($this->groupType).'/'.$this->id;
    }
}
