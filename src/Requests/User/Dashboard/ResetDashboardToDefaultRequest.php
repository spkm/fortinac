<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Resets the Dashboard Tiles to default if the currently logged on user owns that dashboard: POST /user/dashboard/{id}/resetToDefault.
 */
class ResetDashboardToDefaultRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/dashboard/'.$this->id.'/resetToDefault';
    }
}
