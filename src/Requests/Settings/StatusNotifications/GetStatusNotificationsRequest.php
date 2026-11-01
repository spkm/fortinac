<?php

namespace spkm\FortiNac\Requests\Settings\StatusNotifications;

use spkm\FortiNac\Data\Settings\StatusNotifications;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all the status notifications for the Persistent Agent: GET /settings/agent/status-notifications.
 */
class GetStatusNotificationsRequest extends ItemRequest
{
    protected ?string $dto = StatusNotifications::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/status-notifications';
    }
}
