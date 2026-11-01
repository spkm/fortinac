<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Retruns all tasks assigned to or created by the current user: GET /system/background-task/current-user.
 */
class GetBackgroundTaskCurrentUserRequest extends ListRequest
{
    protected ?string $dto = BackgroundTask::class;

    public function resolveEndpoint(): string
    {
        return '/system/background-task/current-user';
    }
}
