<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Supplicant Configuration record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/supplicant-configuration.
 */
class CreateSupplicantConfigurationRequest extends WriteRequest
{
    protected ?string $dto = SupplicantConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration';
    }
}
