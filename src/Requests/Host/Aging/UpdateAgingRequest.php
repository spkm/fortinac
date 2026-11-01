<?php

namespace spkm\FortiNac\Requests\Host\Aging;

use spkm\FortiNac\Data\Host\Aging;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds or modifies the Host Aging Settings: POST /host/aging.
 *
 * Parameters: registeredHostValidTime, registeredHostInactiveTime, unregHostValidTime, unregHostInactiveTime, userValidTime, userInactiveTime, deleteRegHostsWithUser.
 */
class UpdateAgingRequest extends ActionRequest
{
    protected ?string $dto = Aging::class;

    public function resolveEndpoint(): string
    {
        return '/host/aging';
    }
}
