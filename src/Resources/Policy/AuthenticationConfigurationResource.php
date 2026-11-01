<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\AuthenticationConfiguration;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\CreateAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteAuthenticationConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\DeleteManyAuthenticationConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\GetAuthenticationConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\AuthenticationConfiguration\UpdateAuthenticationConfigurationRequest;

/**
 * Authentication Configuration, from FortiNac::policy()->authenticationConfigurations().
 *
 * @extends Builder<AuthenticationConfiguration>
 */
class AuthenticationConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AuthenticationConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuthenticationConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAuthenticationConfigurationRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAuthenticationConfigurationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAuthenticationConfigurationRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAuthenticationConfigurationRequest((int) $id, $options);
    }

    /**
     * Returns a list of records that reference this Authentication Configuration record: GET /policy/authentication-configuration/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetAuthenticationConfigurationUsageRequest($id));
    }

    /**
     * Deletes a list of Authentication Configuration records supplied under the id parameter: POST /policy/authentication-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAuthenticationConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Authentication Configuration records by ID: POST /policy/authentication-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAuthenticationConfigurationViaPostRequest($id, $options));
    }
}
