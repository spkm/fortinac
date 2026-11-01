<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Authentication Configuration record: GET /policy/authentication-configuration/{id}/usage.
 */
class GetAuthenticationConfigurationUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration/'.$this->id.'/usage';
    }
}
