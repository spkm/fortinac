<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Container records in the database: GET /settings/integration/ldap/count/all.
 */
class CountAllLdapServersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap/count/all';
    }
}
