<?php

namespace spkm\FortiNac\Requests\Settings\StatusNotifications;

use spkm\FortiNac\Data\Settings\StatusNotifications;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Configures status notifications for the Persistent Agent: POST /settings/agent/status-notifications.
 */
class UpdateStatusNotificationsRequest extends WriteRequest
{
    protected ?string $dto = StatusNotifications::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/status-notifications';
    }
}
