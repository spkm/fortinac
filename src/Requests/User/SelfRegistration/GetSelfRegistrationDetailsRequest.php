<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Data\User\SelfRegistrationDetails;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the supplied guest account details for the self registration request: GET /user/guest-self-registration/{id}/details.
 */
class GetSelfRegistrationDetailsRequest extends ItemRequest
{
    protected ?string $dto = SelfRegistrationDetails::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/'.$this->id.'/details';
    }
}
