<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Data\Policy\RoleMapping;
use spkm\FortiNac\Requests\ListRequest;

/**
 * View a list of the role(s) assigned to the selected device or port and the network access ID for that role on the device: GET /policy/role-mapping/membership.
 */
class GetRoleMappingMembershipRequest extends ListRequest
{
    protected ?string $dto = RoleMapping::class;

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/membership';
    }
}
