<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Data\Settings\WebServiceDefinition;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Web Service Definition records matching the supplied filter: GET /settings/security/web-service-definition/{id}.
 */
class GetWebServiceDefinitionRequest extends ItemRequest
{
    protected ?string $dto = WebServiceDefinition::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition/'.$this->id;
    }
}
