<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Winbind configuration objects: GET /winbind/config/all.
 */
class GetWinbindConfigAllRequest extends ListRequest
{
    protected ?string $dto = WinbindConfig::class;

    public function resolveEndpoint(): string
    {
        return '/winbind/config/all';
    }
}
