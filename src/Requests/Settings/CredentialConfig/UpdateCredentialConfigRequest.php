<?php

namespace spkm\FortiNac\Requests\Settings\CredentialConfig;

use spkm\FortiNac\Data\Settings\CredentialConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets the credential configuration for Persistent Agent: POST /settings/agent/credential-config.
 */
class UpdateCredentialConfigRequest extends WriteRequest
{
    protected ?string $dto = CredentialConfig::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/credential-config';
    }
}
