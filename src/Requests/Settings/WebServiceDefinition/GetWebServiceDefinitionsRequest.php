<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Data\Settings\WebServiceDefinition;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Web Service Definition records matching the supplied filter: GET /settings/security/web-service-definition.
 */
class GetWebServiceDefinitionsRequest extends ListRequest
{
    protected ?string $dto = WebServiceDefinition::class;

    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition';
    }
}
