<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Container records in the database: GET /settings/integration/ldap/{id}.
 */
class GetLdapServerRequest extends ItemRequest
{
    protected ?string $dto = LdapServer::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap/'.$this->id;
    }
}
