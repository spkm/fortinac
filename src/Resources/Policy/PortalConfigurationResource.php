<?php

namespace spkm\FortiNac\Resources\Policy;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Policy\PortalConfiguration;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\DeletePortalConfigurationRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationsRequest;
use spkm\FortiNac\Requests\Policy\PortalConfiguration\GetPortalConfigurationUsageRequest;

/**
 * Portal Configuration, Portal Policy, from FortiNac::policy()->portalConfigurations().
 *
 * @extends Builder<PortalConfiguration>
 */
class PortalConfigurationResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PortalConfiguration::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPortalConfigurationsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetPortalConfigurationRequest($this->intId($id));
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeletePortalConfigurationRequest($this->intId($id), $options);
    }

    /**
     * Returns a list of records that reference this Portal Configuration record: GET /policy/portal-configuration/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetPortalConfigurationUsageRequest($id));
    }
}
