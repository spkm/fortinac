<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Background Task record which match the supplied filter: GET /system/background-task.
 */
class GetBackgroundTasksRequest extends ListRequest
{
    protected ?string $dto = BackgroundTask::class;

    public function resolveEndpoint(): string
    {
        return '/system/background-task';
    }
}
