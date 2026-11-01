<?php

namespace spkm\FortiNac\Requests\Host\RegistrationRequest;

use spkm\FortiNac\Data\Host\RegistrationRequest;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Host Registration Request records matching the supplied filter: GET /host/registration-request.
 */
class GetRegistrationRequestsRequest extends ListRequest
{
    protected ?string $dto = RegistrationRequest::class;

    public function resolveEndpoint(): string
    {
        return '/host/registration-request';
    }
}
