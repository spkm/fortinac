<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * GET /user/dashboard/host-summary: GET /user/dashboard/host-summary.
 */
class GetDashboardHostSummaryRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/dashboard/host-summary';
    }
}
