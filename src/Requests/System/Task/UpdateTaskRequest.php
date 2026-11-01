<?php

namespace spkm\FortiNac\Requests\System\Task;

use JsonSerializable;
use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing task record in the database: POST /system/task/{id}.
 */
class UpdateTaskRequest extends WriteRequest
{
    protected ?string $dto = Task::class;

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
        return '/system/task/'.$this->id;
    }
}
