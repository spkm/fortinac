<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\DashboardDeviceSummary;
use spkm\FortiNac\Requests\ListRequest;

/**
 * GET /user/dashboard/device-summary: GET /user/dashboard/device-summary.
 */
class GetDashboardDeviceSummaryRequest extends ListRequest
{
    protected ?string $dto = DashboardDeviceSummary::class;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/device-summary';
    }
}
