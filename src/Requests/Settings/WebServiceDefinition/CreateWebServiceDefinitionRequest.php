<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Web Service Definition record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/security/web-service-definition.
 */
class CreateWebServiceDefinitionRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition';
    }
}
