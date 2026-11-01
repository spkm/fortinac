<?php

namespace spkm\FortiNac\Requests\Policy\RoleMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Retrieves the current state of the Direct Configuration flag, used for determining if the legacy configuration mode is available: GET /policy/role-mapping/direct-configuration.
 */
class GetRoleMappingDirectConfigurationRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/role-mapping/direct-configuration';
    }
}
