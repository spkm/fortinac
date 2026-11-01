<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Authentication Configuration record, updating instead if the profile has an existing DBID: POST /policy/authentication-configuration.
 */
class CreateAuthenticationConfigurationRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration';
    }
}
