<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * GET /user/dashboard/user-summary: GET /user/dashboard/user-summary.
 */
class GetDashboardUserSummaryRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/dashboard/user-summary';
    }
}
