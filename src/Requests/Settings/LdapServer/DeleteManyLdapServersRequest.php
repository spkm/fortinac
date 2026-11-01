<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Container record or records supplied, if they are not currently in use: POST /settings/integration/ldap/delete.
 *
 * Parameters: id.
 */
class DeleteManyLdapServersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap/delete';
    }
}
