<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Background Task record with the supplied DBID: GET /system/background-task/{id}.
 */
class GetBackgroundTaskRequest extends ItemRequest
{
    protected ?string $dto = BackgroundTask::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/background-task/'.$this->id;
    }
}
