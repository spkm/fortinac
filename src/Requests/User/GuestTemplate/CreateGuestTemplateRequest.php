<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Data\User\GuestTemplate;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Adds a new guest template record to the database: POST /user/guest-template.
 */
class CreateGuestTemplateRequest extends WriteRequest
{
    protected ?string $dto = GuestTemplate::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest-template';
    }
}
