<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Container records which match the supplied filter: GET /settings/integration/ldap.
 */
class GetLdapServersRequest extends ListRequest
{
    protected ?string $dto = LdapServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap';
    }
}
