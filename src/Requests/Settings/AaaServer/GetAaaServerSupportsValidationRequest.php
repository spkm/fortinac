<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns false when legacy proxy radius is no longer supported and thus the validation user/pwd entry is no longer applicable on a proxy server config: GET /settings/integration/aaa/supportsValidation.
 */
class GetAaaServerSupportsValidationRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/supportsValidation';
    }
}
