<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Data\User\Dashboard;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of User Dashboard records matching the supplied filter: GET /user/dashboard/{id}.
 */
class GetDashboardRequest extends ItemRequest
{
    protected ?string $dto = Dashboard::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/'.$this->id;
    }
}
