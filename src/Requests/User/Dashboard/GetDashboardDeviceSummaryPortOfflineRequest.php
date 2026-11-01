<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\DashboardDeviceSummaryDeviceByStatus;
use spkm\FortiNac\Requests\ListRequest;

/**
 * GET /user/dashboard/device-summary/port/offline: GET /user/dashboard/device-summary/port/offline.
 */
class GetDashboardDeviceSummaryPortOfflineRequest extends ListRequest
{
    protected ?string $dto = DashboardDeviceSummaryDeviceByStatus::class;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/device-summary/port/offline';
    }
}
