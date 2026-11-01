<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Disables the Adapter that matches the supplied DBID: POST /adapter/{id}/disable.
 */
class DisableAdapterRequest extends ActionRequest
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
        return '/adapter/'.$this->id.'/disable';
    }
}
