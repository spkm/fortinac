<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Data\System\LocalPropertiesSystemInitialize;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets initial passwords for the CLI and the Administrative UI and configures the NMAP service. This does not change the CLI passwords immediately, as the final values are written by the Config Wizard: POST /system/local-properties/system/initialize.
 */
class PostLocalPropertiesSystemInitializeRequest extends WriteRequest
{
    protected ?string $dto = LocalPropertiesSystemInitialize::class;

    public function resolveEndpoint(): string
    {
        return '/system/local-properties/system/initialize';
    }
}
