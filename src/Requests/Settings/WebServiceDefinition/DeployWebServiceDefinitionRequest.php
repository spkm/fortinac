<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Writes the Web Service Definition into an Apache configuration: POST /settings/security/web-service-definition/deploy.
 */
class DeployWebServiceDefinitionRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition/deploy';
    }
}
