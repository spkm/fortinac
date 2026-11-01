<?php

namespace spkm\FortiNac\Requests\Policy\AuthenticationConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Authentication Configuration records supplied under the id parameter: POST /policy/authentication-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManyAuthenticationConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/authentication-configuration/delete';
    }
}
