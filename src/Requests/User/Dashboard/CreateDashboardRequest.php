<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new user Dashboard record, updating instead if the supplied profile has a DBID of one that already exists: POST /user/dashboard.
 */
class CreateDashboardRequest extends WriteRequest
{
    protected ?string $dto = Dashboard::class;

    public function resolveEndpoint(): string
    {
        return '/user/dashboard';
    }
}
