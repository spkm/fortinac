<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\LdapServer;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CountAllLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CountLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\CreateLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteLdapServerViaPostRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\DeleteManyLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServerRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServersRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\GetLdapServerUsageRequest;
use spkm\FortiNac\Requests\Settings\LdapServer\UpdateLdapServerRequest;

/**
 * LDAP, from FortiNac::settings()->ldap().
 *
 * @extends Builder<LdapServer>
 */
class LdapServerResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, LdapServer::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetLdapServersRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountLdapServersRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetLdapServerRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateLdapServerRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateLdapServerRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteLdapServerRequest((int) $id, $options);
    }

    /**
     * Returns the count of all Container records in the database: GET /settings/integration/ldap/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllLdapServersRequest);
    }

    /**
     * Returns a list of Container records that reference this record: GET /settings/integration/ldap/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetLdapServerUsageRequest($id, $query));
    }

    /**
     * Deletes the Container record or records supplied, if they are not currently in use: POST /settings/integration/ldap/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyLdapServersRequest(['id' => $ids]));
    }

    /**
     * Deletes the Container record supplied, if it is not currently in use: POST /settings/integration/ldap/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteLdapServerViaPostRequest($id, $options));
    }
}
