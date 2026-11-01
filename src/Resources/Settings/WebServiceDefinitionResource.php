<?php

namespace spkm\FortiNac\Resources\Settings;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\Settings\WebServiceDefinition;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\CreateWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteManyWebServiceDefinitionsRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeleteWebServiceDefinitionViaPostRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\DeployWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionsRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\GetWebServiceDefinitionUsageRequest;
use spkm\FortiNac\Requests\Settings\WebServiceDefinition\UpdateWebServiceDefinitionRequest;

/**
 * Web Service Definition, from FortiNac::settings()->webServiceDefinitions().
 *
 * @extends Builder<WebServiceDefinition>
 */
class WebServiceDefinitionResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, WebServiceDefinition::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWebServiceDefinitionsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetWebServiceDefinitionRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateWebServiceDefinitionRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateWebServiceDefinitionRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteWebServiceDefinitionRequest((int) $id, $options);
    }

    /**
     * Returns a list of records that reference this Web Service Definition record: GET /settings/security/web-service-definition/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetWebServiceDefinitionUsageRequest($id));
    }

    /**
     * Deletes a list of Web Service Definition records supplied under the id parameter: POST /settings/security/web-service-definition/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyWebServiceDefinitionsRequest(['id' => $ids]));
    }

    /**
     * Writes the Web Service Definition into an Apache configuration: POST /settings/security/web-service-definition/deploy.
     *
     * @param  array<string, mixed>  $options
     */
    public function deploy(array $options = []): bool
    {
        return $this->perform(new DeployWebServiceDefinitionRequest($options));
    }

    /**
     * Deletes a single Web Service Definition record by ID: POST /settings/security/web-service-definition/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteWebServiceDefinitionViaPostRequest($id, $options));
    }
}
