<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use JsonSerializable;
use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Background Task record in the database: POST /system/background-task/{id}.
 */
class UpdateBackgroundTaskRequest extends WriteRequest
{
    protected ?string $dto = BackgroundTask::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/background-task/'.$this->id;
    }
}
