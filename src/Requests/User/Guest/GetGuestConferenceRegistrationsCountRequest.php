<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Data\User\GuestConferenceRegistrationsCount;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the number of registered attendees for the conferences which match the supplied filter: GET /user/guest/conference/registrations/count.
 *
 * Parameters: filter, start, count, sortKey, sortDir.
 */
class GetGuestConferenceRegistrationsCountRequest extends ItemRequest
{
    protected ?string $dto = GuestConferenceRegistrationsCount::class;

    /**
     * @param  array<string, mixed>  $options  Query options: filter, start, count, sortKey, sortDir
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/guest/conference/registrations/count';
    }
}
