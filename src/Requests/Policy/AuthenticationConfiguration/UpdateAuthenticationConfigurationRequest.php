<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\AuthenticationConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Authentication Configuration record: POST /policy/authentication-configuration/{id}.
 */
class UpdateAuthenticationConfigurationRequest extends WriteRequest
{
    protected ?string $dto = AuthenticationConfiguration::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration/'.$this->id;
    }
}
