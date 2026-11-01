<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Access Configuration record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/access-configuration.
 */
class CreateAccessConfigurationRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration';
    }
}
