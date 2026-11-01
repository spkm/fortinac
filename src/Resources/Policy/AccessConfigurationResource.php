<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\AccessConfiguration;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CountAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CountAllAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\CreateAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteAccessConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\DeleteManyAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationDirectConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\GetAccessConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\AccessConfiguration\UpdateAccessConfigurationRequest;

/**
 * Access Configuration, from FortiNac::policy()->accessConfigurations().
 *
 * @extends Builder<AccessConfiguration>
 */
class AccessConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AccessConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAccessConfigurationsRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountAccessConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetAccessConfigurationRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateAccessConfigurationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateAccessConfigurationRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteAccessConfigurationRequest((int) $id, $options);
    }

    /**
     * Returns a total count of all Access Configuration records: GET /policy/access-configuration/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllAccessConfigurationsRequest);
    }

    /**
     * Returns whether or not direct configuration, a legacy concept, is allowed on the system: GET /policy/access-configuration/direct-configuration.
     */
    public function directConfiguration(): mixed
    {
        return $this->fetch(new GetAccessConfigurationDirectConfigurationRequest);
    }

    /**
     * Returns a list of records that reference this Access Configuration record: GET /policy/access-configuration/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetAccessConfigurationUsageRequest($id, $query));
    }

    /**
     * Returns the information necessary to create an Access Configuration: GET /policy/access-configuration/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetAccessConfigurationSupportingInfoRequest);
    }

    /**
     * Deletes a list of Access Configuration records supplied under the id parameter: POST /policy/access-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyAccessConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Access Configuration record by ID: POST /policy/access-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteAccessConfigurationViaPostRequest($id, $options));
    }
}
