<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of User Dashboard records matching the supplied filter owned by the currently logged on user: GET /user/dashboard.
 */
class GetDashboardsRequest extends ListRequest
{
    protected ?string $dto = Dashboard::class;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard';
    }
}
