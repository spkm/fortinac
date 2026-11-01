<?php

namespace spkm\FortiNac\Requests\Settings\AaaServer;

use spkm\FortiNac\Data\Settings\AaaServerValidateAaaServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Validate connectivity to the specified AAA server config: POST /settings/integration/aaa/validate.
 */
class ValidateAaaServerRequest extends WriteRequest
{
    protected ?string $dto = AaaServerValidateAaaServer::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa/validate';
    }
}
