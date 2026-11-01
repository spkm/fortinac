<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Data\System\LocalPropertiesPasswordsChange;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Changes the previously configured passwords for the appliance: POST /system/local-properties/passwords/change.
 */
class PostLocalPropertiesPasswordsChangeRequest extends WriteRequest
{
    protected ?string $dto = LocalPropertiesPasswordsChange::class;

    public function resolveEndpoint(): string
    {
        return '/system/local-properties/passwords/change';
    }
}
