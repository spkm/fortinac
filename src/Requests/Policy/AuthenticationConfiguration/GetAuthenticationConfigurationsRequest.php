<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Data\Policy\AuthenticationConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Authentication Configuration records matching the supplied filter: GET /policy/authentication-configuration.
 */
class GetAuthenticationConfigurationsRequest extends ListRequest
{
    protected ?string $dto = AuthenticationConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration';
    }
}
