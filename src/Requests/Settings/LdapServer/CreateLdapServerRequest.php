<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new Container record to the database: POST /settings/integration/ldap.
 */
class CreateLdapServerRequest extends WriteRequest
{
    protected ?string $dto = LdapServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap';
    }
}
