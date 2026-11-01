<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Data\Policy\AuthenticationConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Authentication Configuration records matching the supplied filter: GET /policy/authentication-configuration/{id}.
 */
class GetAuthenticationConfigurationRequest extends ItemRequest
{
    protected ?string $dto = AuthenticationConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration/'.$this->id;
    }
}
