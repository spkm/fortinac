<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Container record in the database: POST /settings/integration/ldap/{id}.
 */
class UpdateLdapServerRequest extends WriteRequest
{
    protected ?string $dto = LdapServer::class;

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
        return '/settings/integration/ldap/'.$this->id;
    }
}
