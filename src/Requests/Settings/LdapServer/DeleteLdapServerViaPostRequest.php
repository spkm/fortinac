<?php

namespace spkm\FortiNac\Requests\Settings\LdapServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Container record supplied, if it is not currently in use: POST /settings/integration/ldap/{id}/delete.
 */
class DeleteLdapServerViaPostRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/ldap/'.$this->id.'/delete';
    }
}
