<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Data\User\Guest;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates one or more guest accounts in a single request, each using the same guest template. The template may be provided by either name or ID: POST /user/guest/bulk.
 */
class PostGuestBulkRequest extends WriteRequest
{
    protected ?string $dto = Guest::class;

    public function resolveEndpoint(): string
    {
        return '/user/guest/bulk';
    }
}
