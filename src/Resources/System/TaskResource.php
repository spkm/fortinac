<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\System\Task;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\System\Task\CountAllTasksRequest;
use spkm\FortiNac\Requests\System\Task\CountTasksRequest;
use spkm\FortiNac\Requests\System\Task\CreateTaskRequest;
use spkm\FortiNac\Requests\System\Task\DeleteManyTasksRequest;
use spkm\FortiNac\Requests\System\Task\DeleteTaskRequest;
use spkm\FortiNac\Requests\System\Task\DeleteTaskViaPostRequest;
use spkm\FortiNac\Requests\System\Task\GetTaskRequest;
use spkm\FortiNac\Requests\System\Task\GetTasksRequest;
use spkm\FortiNac\Requests\System\Task\GetTaskUsageRequest;
use spkm\FortiNac\Requests\System\Task\UpdateTaskRequest;

/**
 * Task, from FortiNac::system()->tasks().
 *
 * @extends Builder<Task>
 */
class TaskResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Task::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetTasksRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountTasksRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetTaskRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateTaskRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateTaskRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteTaskRequest((int) $id, $options);
    }

    /**
     * Returns the count of all task records in the database: GET /system/task/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllTasksRequest);
    }

    /**
     * Returns a list of task records that reference this record: GET /system/task/{id}/usage.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id): Collection
    {
        return $this->fetch(new GetTaskUsageRequest($id));
    }

    /**
     * Deletes the task record or records supplied, if they are not currently in use: POST /system/task/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyTasksRequest(['id' => $ids]));
    }

    /**
     * Deletes the task record supplied, if they are not currently in use: POST /system/task/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteTaskViaPostRequest($id, $options));
    }
}
