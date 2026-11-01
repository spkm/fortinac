<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Data\Settings\TlsServiceConfigurationAliases;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\CreateTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteManyTlsServiceConfigurationsRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeleteTlsServiceConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\DeployTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationAliasesRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRadiusciphersRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationsRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\GetTlsServiceConfigurationUsageRequest;
use spkm\FortiNac\Requests\Settings\TlsServiceConfiguration\UpdateTlsServiceConfigurationRequest;

/**
 * TLS Service Configuration, from FortiNac::settings()->tlsServiceConfigurations().
 *
 * @extends Builder<TlsServiceConfiguration>
 */
class TlsServiceConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, TlsServiceConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetTlsServiceConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetTlsServiceConfigurationRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateTlsServiceConfigurationRequest([...$body, ...$options]);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateTlsServiceConfigurationRequest($this->intId($id), [...$body, ...$options]);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteTlsServiceConfigurationRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of TLS Service Configuration records that reference this record: GET /settings/tls-service-configuration/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetTlsServiceConfigurationUsageRequest($id));
    }

    /**
     * Returns the list of iana ciphers with a corresponding openssi version for use with radius: GET /settings/tls-service-configuration/radiusciphers.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function radiusciphers(Query|array $query = []): Collection
    {
        return $this->fetch(new GetTlsServiceConfigurationRadiusciphersRequest($query));
    }

    /**
     * Returns the list of aliases available to the certificate manager: GET /settings/tls-service-configuration/aliases.
     *
     * @param  array<string, mixed>  $options  Query options: type
     */
    public function aliases(array $options = []): ?TlsServiceConfigurationAliases
    {
        return $this->fetchOrNull(new GetTlsServiceConfigurationAliasesRequest($options));
    }

    /**
     * Deletes a list of TLS Service Configuration records supplied under the id parameter: POST /settings/tls-service-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyTlsServiceConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Reinitializes Persistent Agent transports from the configurations in the database: POST /settings/tls-service-configuration/deploy.
     *
     * @param  array<string, mixed>  $options
     */
    public function deploy(array $options = []): bool
    {
        return $this->perform(new DeployTlsServiceConfigurationRequest($options));
    }

    /**
     * Deletes a single TLS Service Configuration record by ID: POST /settings/tls-service-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteTlsServiceConfigurationViaPostRequest($id, $options));
    }
}
