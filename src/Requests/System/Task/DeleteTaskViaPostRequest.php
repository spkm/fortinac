<?php

namespace spkm\FortiNac\Requests\System\Task;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the task record supplied, if they are not currently in use: POST /system/task/{id}/delete.
 */
class DeleteTaskViaPostRequest extends ActionRequest
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
        return '/system/task/'.$this->id.'/delete';
    }
}
