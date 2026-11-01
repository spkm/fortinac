<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied user dashboard, shifting other ranks as necessary: POST /user/dashboard/rank/set.
 *
 * Parameters: id, rank.
 */
class SetDashboardRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/dashboard/rank/set';
    }
}
