<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of User Dashboard records supplied under the id parameter: POST /user/dashboard/delete.
 *
 * Parameters: id.
 */
class DeleteManyDashboardsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/user/dashboard/delete';
    }
}
