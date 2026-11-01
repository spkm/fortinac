<?php

namespace spkm\FortiNac\Requests\System\BackgroundTask;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Marks a Background Task record as complete: POST /system/background-task/{id}/complete.
 */
class PostBackgroundTaskCompleteRequest extends ActionRequest
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
        return '/system/background-task/'.$this->id.'/complete';
    }
}
