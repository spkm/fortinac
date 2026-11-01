<?php

namespace spkm\FortiNac\Requests\Settings\CredentialConfig;

use spkm\FortiNac\Data\Settings\CredentialConfig;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured Credentials for the Persistent Agent: GET /settings/agent/credential-config.
 */
class GetCredentialConfigRequest extends ItemRequest
{
    protected bool $cacheable = false;

    protected ?string $dto = CredentialConfig::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/credential-config';
    }
}
