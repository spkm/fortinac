<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Access Configuration records supplied under the id parameter: POST /policy/access-configuration/delete.
 *
 * Parameters: id.
 */
class DeleteManyAccessConfigurationsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/delete';
    }
}
