<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns whether or not direct configuration, a legacy concept, is allowed on the system: GET /policy/access-configuration/direct-configuration.
 */
class GetAccessConfigurationDirectConfigurationRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/direct-configuration';
    }
}
