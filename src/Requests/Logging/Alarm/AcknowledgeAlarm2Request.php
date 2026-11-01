<?php

namespace spkm\FortiNac\Requests\Logging\Alarm;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Marks an alarm as Acknowledged, resolving any applied actions: POST /logging/alarm/{id}/acknowledge.
 */
class AcknowledgeAlarm2Request extends ActionRequest
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
        return '/logging/alarm/'.$this->id.'/acknowledge';
    }
}
