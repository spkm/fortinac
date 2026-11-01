<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the Alarm record supplied, if they are none are currently in use: POST /logging/alarm/{id}/delete.
 */
class DeleteAlarmViaPostRequest extends ActionRequest
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
        return '/logging/alarm/'.$this->id.'/delete';
    }
}
