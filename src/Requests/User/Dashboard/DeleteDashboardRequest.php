<?php

namespace spkm\FortiNac\Requests\User\Dashboard;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single user dashboard record by ID: DELETE /user/dashboard/{id}.
 */
class DeleteDashboardRequest extends DeleteRequest
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
        return '/user/dashboard/'.$this->id;
    }
}
