<?php

namespace spkm\FortiNac\Resources\System;

use spkm\FortiNac\Data\System\ScheduledTask;
use spkm\FortiNac\Data\System\ScheduledTaskActivityTypes;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\CountAllScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\CountScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteManyScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DeleteScheduledTaskViaPostRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\DisableScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\EnableScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskActivityTypesRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTaskRunningRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\GetScheduledTasksRequest;
use spkm\FortiNac\Requests\System\ScheduledTask\RunScheduledTaskRequest;

/**
 * Scheduler, from FortiNac::system()->scheduler().
 *
 * @extends Builder<ScheduledTask>
 */
class ScheduledTaskResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ScheduledTask::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetScheduledTasksRequest($query);
    }

    protected function countRequest(Query $query): FortiNacRequest
    {
        return new CountScheduledTasksRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetScheduledTaskRequest((int) $id);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteScheduledTaskRequest((int) $id, $options);
    }

    /**
     * Returns the count of all scheduled task records in the database: GET /system/scheduler/count/all.
     */
    public function countAll(): int
    {
        return (int) $this->fetch(new CountAllScheduledTasksRequest);
    }

    /**
     * Returns if the provided scheduled task is currently running: GET /system/scheduler/{name}/running.
     */
    public function running(string $name): mixed
    {
        return $this->fetch(new GetScheduledTaskRunningRequest($name));
    }

    /**
     * Returns the full set of activity types known to the scheduler: GET /system/scheduler/activity-types.
     */
    public function activityTypes(): ?ScheduledTaskActivityTypes
    {
        return $this->fetchOrNull(new GetScheduledTaskActivityTypesRequest);
    }

    /**
     * Deletes the scheduled task record or records supplied, if they are none are currently in use: POST /system/scheduler/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyScheduledTasksRequest(['id' => $ids]));
    }

    /**
     * Deletes the scheduled task record or records supplied, if they are none are currently in use: POST /system/scheduler/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteScheduledTaskViaPostRequest($id, $options));
    }

    /**
     * Disables the supplied scheduled task: POST /system/scheduler/{id}/disable.
     *
     * @param  array<string, mixed>  $options
     */
    public function disable(int $id, array $options = []): bool
    {
        return $this->perform(new DisableScheduledTaskRequest($id, $options));
    }

    /**
     * Enables the supplied scheduled task: POST /system/scheduler/{id}/enable.
     *
     * @param  array<string, mixed>  $options
     */
    public function enable(int $id, array $options = []): bool
    {
        return $this->perform(new EnableScheduledTaskRequest($id, $options));
    }

    /**
     * Runs one or more scheduled tasks with the supplied IDs: POST /system/scheduler/run.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function run(array $options = []): bool
    {
        return $this->perform(new RunScheduledTaskRequest($options));
    }
}
