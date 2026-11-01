<?php

namespace spkm\FortiNac\Resources\User;

use Illuminate\Support\Collection;
use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Data\User\DashboardDeviceSummary;
use spkm\FortiNac\Data\User\DashboardDeviceSummaryDeviceByStatus;
use spkm\FortiNac\Data\User\DashboardScanSummaryPerDay;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Query\Builder;
use spkm\FortiNac\Query\Query;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\ListRequest;
use spkm\FortiNac\Requests\User\Dashboard\CreateDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteDashboardViaPostRequest;
use spkm\FortiNac\Requests\User\Dashboard\DeleteManyDashboardsRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardAgentSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryPortOfflineRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryPortOnlineRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardDeviceSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardHostSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardScanSummaryPerDayRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardScanSummaryPerHourRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardsRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardUsageRequest;
use spkm\FortiNac\Requests\User\Dashboard\GetDashboardUserSummaryRequest;
use spkm\FortiNac\Requests\User\Dashboard\PostDashboardDeviceSummaryDeviceByStatusRequest;
use spkm\FortiNac\Requests\User\Dashboard\ResetDashboardToDefaultRequest;
use spkm\FortiNac\Requests\User\Dashboard\SetDashboardRankRequest;
use spkm\FortiNac\Requests\User\Dashboard\UpdateDashboardRequest;

/**
 * Dashboard, from FortiNac::user()->dashboards().
 *
 * @extends Builder<Dashboard>
 */
class DashboardResource extends Builder
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, Dashboard::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDashboardsRequest($query);
    }

    protected function itemRequest(int|string $id): FortiNacRequest
    {
        return new GetDashboardRequest($this->intId($id));
    }

    protected function createRequest(array $body, array $options): FortiNacRequest
    {
        return new CreateDashboardRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): FortiNacRequest
    {
        return new UpdateDashboardRequest($this->intId($id), $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): FortiNacRequest
    {
        return new DeleteDashboardRequest($this->intId($id), $options);
    }

    /**
     * GET /user/dashboard/agent-summary: GET /user/dashboard/agent-summary.
     */
    public function agentSummary(): mixed
    {
        return $this->fetch(new GetDashboardAgentSummaryRequest);
    }

    /**
     * GET /user/dashboard/device-summary: GET /user/dashboard/device-summary.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, DashboardDeviceSummary>
     */
    public function deviceSummary(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDashboardDeviceSummaryRequest($query));
    }

    /**
     * POST /user/dashboard/device-summary/device/{tag}/{status}: POST /user/dashboard/device-summary/device/{tag}/{status}.
     *
     * @param  array<string, mixed>  $options
     * @return Collection<int, DashboardDeviceSummaryDeviceByStatus>
     */
    public function deviceSummaryDeviceByStatus(string $tag, string $status, array $options = []): Collection
    {
        return $this->fetch(new PostDashboardDeviceSummaryDeviceByStatusRequest($tag, $status, $options));
    }

    /**
     * GET /user/dashboard/device-summary/port/offline: GET /user/dashboard/device-summary/port/offline.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, DashboardDeviceSummaryDeviceByStatus>
     */
    public function deviceSummaryPortOffline(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDashboardDeviceSummaryPortOfflineRequest($query));
    }

    /**
     * GET /user/dashboard/device-summary/port/online: GET /user/dashboard/device-summary/port/online.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, DashboardDeviceSummaryDeviceByStatus>
     */
    public function deviceSummaryPortOnline(Query|array $query = []): Collection
    {
        return $this->fetch(new GetDashboardDeviceSummaryPortOnlineRequest($query));
    }

    /**
     * Returns a list of records that reference this User Dashboard record: GET /user/dashboard/{id}/usage.
     *
     * @param  Query|array<string, mixed>  $query
     * @return Collection<int, array<string, mixed>>
     */
    public function usage(int $id, Query|array $query = []): Collection
    {
        return $this->fetch(new GetDashboardUsageRequest($id, $query));
    }

    /**
     * Returns a summary of the number of scans per hour over a date range, grouped by the start of the hour: GET /user/dashboard/scan-summary/per-day.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, type, platform, scan
     */
    public function scanSummaryPerDay(array $options = []): ?DashboardScanSummaryPerDay
    {
        return $this->fetchOrNull(new GetDashboardScanSummaryPerDayRequest($options));
    }

    /**
     * Returns a summary of the number of scans per hour over a date range, grouped by the start of the hour: GET /user/dashboard/scan-summary/per-hour.
     *
     * @param  array<string, mixed>  $options  Query options: startDate, endDate, type, platform, scan
     */
    public function scanSummaryPerHour(array $options = []): ?DashboardScanSummaryPerDay
    {
        return $this->fetchOrNull(new GetDashboardScanSummaryPerHourRequest($options));
    }

    /**
     * GET /user/dashboard/host-summary: GET /user/dashboard/host-summary.
     */
    public function hostSummary(): mixed
    {
        return $this->fetch(new GetDashboardHostSummaryRequest);
    }

    /**
     * GET /user/dashboard/user-summary: GET /user/dashboard/user-summary.
     */
    public function userSummary(): mixed
    {
        return $this->fetch(new GetDashboardUserSummaryRequest);
    }

    /**
     * Deletes a list of User Dashboard records supplied under the id parameter: POST /user/dashboard/delete.
     *
     * @param  list<int|string>  $ids
     */
    public function deleteMany(array $ids): bool
    {
        return $this->perform(new DeleteManyDashboardsRequest(['id' => $ids]));
    }

    /**
     * Deletes a single User Dashboard record by ID: POST /user/dashboard/{id}/delete.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteViaPost(int $id, array $options = []): bool
    {
        return $this->perform(new DeleteDashboardViaPostRequest($id, $options));
    }

    /**
     * Resets the Dashboard Tiles to default if the currently logged on user owns that dashboard: POST /user/dashboard/{id}/resetToDefault.
     *
     * @param  array<string, mixed>  $options
     */
    public function resetToDefault(int $id, array $options = []): bool
    {
        return $this->perform(new ResetDashboardToDefaultRequest($id, $options));
    }

    /**
     * Sets the rank of the supplied user dashboard, shifting other ranks as necessary: POST /user/dashboard/rank/set.
     *
     * @param  array<string, mixed>  $options  Query options: id, rank
     */
    public function setRank(array $options = []): bool
    {
        return $this->perform(new SetDashboardRankRequest($options));
    }
}
