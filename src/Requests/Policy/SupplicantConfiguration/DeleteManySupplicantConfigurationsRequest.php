<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Supplicant Configuration records supplied under the id parameter: POST /policy/supplicant-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManySupplicantConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration/delete';
    }
}
