<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Host Registration Request records supplied under the id parameter: POST /host/registration-request/delete.
 *
 * Parameters: id.
 */
class DeleteManyRegistrationRequestsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/registration-request/delete';
    }
}
