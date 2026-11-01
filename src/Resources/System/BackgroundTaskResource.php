<?php

namespace spkm\FortiNac\Resources\System;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\System\BackgroundTask;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\CreateBackgroundTaskRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\DeleteManyBackgroundTasksRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTaskCurrentUserRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTaskRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\GetBackgroundTasksRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\PostBackgroundTaskCompleteRequest;
use spkm\FortiNac\Requests\System\BackgroundTask\UpdateBackgroundTaskRequest;

/**
 * Background Task, from FortiNac::system()->backgroundTasks().
 *
 * @extends Builder<BackgroundTask>
 */
class BackgroundTaskResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, BackgroundTask::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetBackgroundTasksRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetBackgroundTaskRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateBackgroundTaskRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateBackgroundTaskRequest((int) $id, $body, $options);
    }

    /**
     * Retruns all tasks assigned to or created by the current user: GET /system/background-task/current-user.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, BackgroundTask>
     */
    public function currentUser(Query|array $query = []): Collection
    {
        return $this->fetch(new GetBackgroundTaskCurrentUserRequest($query));
    }

    /**
     * Marks a Background Task record as complete: POST /system/background-task/{id}/complete.
     *
     * @param  array<string, mixed>  $options
     */
    public function complete(int $id, array $options = []): bool
    {
        return $this->perform(new PostBackgroundTaskCompleteRequest($id, $options));
    }

    /**
     * Deletes the Background Task record or records supplied: POST /system/background-task/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyBackgroundTasksRequest(['id' => $ids]));
    }
}
