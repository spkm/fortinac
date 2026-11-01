<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a Winbind configuration object: POST /winbind/config.
 */
class CreateWinbindConfigRequest extends WriteRequest
{
    protected ?string $dto = WinbindConfig::class;

    protected string $responseShape = self::LIST;

    public function resolveEndpoint(): string
    {
        return '/winbind/config';
    }
}
