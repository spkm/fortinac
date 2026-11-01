<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Data\User\SelfRegistration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of self registration request records matching the supplied filter: GET /user/guest-self-registration.
 */
class GetSelfRegistrationsRequest extends ListRequest
{
    protected ?string $dto = SelfRegistration::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration';
    }
}
