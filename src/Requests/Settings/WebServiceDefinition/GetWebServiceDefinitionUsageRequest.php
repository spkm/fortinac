<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Web Service Definition record: GET /settings/security/web-service-definition/{id}/usage.
 */
class GetWebServiceDefinitionUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition/'.$this->id.'/usage';
    }
}
