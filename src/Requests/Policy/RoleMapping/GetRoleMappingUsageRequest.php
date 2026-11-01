<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this role mapping record: GET /policy/role-mapping/{id}/usage.
 *
 * Parameters: id.
 */
class GetRoleMappingUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/'.$this->id.'/usage';
    }
}
