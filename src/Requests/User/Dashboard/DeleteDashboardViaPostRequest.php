<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single User Dashboard record by ID: POST /user/dashboard/{id}/delete.
 */
class DeleteDashboardViaPostRequest extends ActionRequest
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
        return '/user/dashboard/'.$this->id.'/delete';
    }
}
