<?php

namespace spkm\FortiNac\Requests\Policy\Role;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Returns a list of role records that reference this record: POST /policy/role/{id}/usage.
 */
class PostRoleUsageRequest extends ActionRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/role/'.$this->id.'/usage';
    }
}
