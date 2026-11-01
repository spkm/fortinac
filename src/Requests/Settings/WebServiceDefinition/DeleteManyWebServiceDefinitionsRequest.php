<?php

namespace spkm\FortiNac\Requests\Settings\WebServiceDefinition;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Web Service Definition records supplied under the id parameter: POST /settings/security/web-service-definition/delete.
 *
 * Parameters: id.
 */
class DeleteManyWebServiceDefinitionsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security/web-service-definition/delete';
    }
}
