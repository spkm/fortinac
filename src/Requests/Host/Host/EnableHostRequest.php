<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the Host Record that matches the supplied DBID: POST /host/{id}/enable.
 */
class EnableHostRequest extends ActionRequest
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
        return '/host/'.$this->id.'/enable';
    }
}
