<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all guest template records which match the supplied filter: GET /user/guest-template.
 */
class GetGuestTemplatesRequest extends ListRequest
{
    protected ?string $dto = GuestTemplate::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest-template';
    }
}
