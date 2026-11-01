<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of Container records matching the supplied filter: GET /settings/integration/ldap/count.
 */
class CountLdapServersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap/count';
    }
}
