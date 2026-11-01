<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\DashboardDeviceSummaryDeviceByStatus;
use spkm\FortiNac\Requests\ListRequest;

/**
 * GET /user/dashboard/device-summary/port/online: GET /user/dashboard/device-summary/port/online.
 */
class GetDashboardDeviceSummaryPortOnlineRequest extends ListRequest
{
    protected ?string $dto = DashboardDeviceSummaryDeviceByStatus::class;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/device-summary/port/online';
    }
}
