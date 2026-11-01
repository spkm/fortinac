<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\CreateSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteManySupplicantConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\DeleteSupplicantConfigurationViaPostRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationSupportingInfoRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\GetSupplicantConfigurationUsageRequest;
use spkm\FortiNac\Requests\Policy\SupplicantConfiguration\UpdateSupplicantConfigurationRequest;

/**
 * Supplicant Policy, from FortiNac::policy()->supplicantConfigurations().
 *
 * @extends Builder<SupplicantConfiguration>
 */
class SupplicantConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SupplicantConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSupplicantConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetSupplicantConfigurationRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateSupplicantConfigurationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateSupplicantConfigurationRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteSupplicantConfigurationRequest((int) $id, $options);
    }

    /**
     * Returns a list of Supplicant Configuration records that reference this recrod: GET /policy/supplicant-configuration/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetSupplicantConfigurationUsageRequest($id));
    }

    /**
     * Returns the information necessary to create a Supplicant Configuration: GET /policy/supplicant-configuration/supporting-info.
     */
    public function supportingInfo(): bool
    {
        return $this->perform(new GetSupplicantConfigurationSupportingInfoRequest);
    }

    /**
     * Deletes a list of Supplicant Configuration records supplied under the id parameter: POST /policy/supplicant-configuration/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManySupplicantConfigurationsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single Supplicant Configuration record by ID: POST /policy/supplicant-configuration/{id}/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteSupplicantConfigurationViaPostRequest($id, $options));
    }
}
