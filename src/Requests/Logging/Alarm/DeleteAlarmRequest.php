<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the alarm record supplied, if it is not currently in use: DELETE /logging/alarm/{id}.
 */
class DeleteAlarmRequest extends DeleteRequest
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
        return '/logging/alarm/'.$this->id;
    }
}
