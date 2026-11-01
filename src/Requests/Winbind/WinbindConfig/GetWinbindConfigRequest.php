<?php

namespace spkm\FortiNac\Requests\Winbind\WinbindConfig;

use spkm\FortiNac\Data\Winbind\WinbindConfig;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns Winbind configuration object by ID: GET /winbind/config/{id}.
 */
class GetWinbindConfigRequest extends ItemRequest
{
    protected ?string $dto = WinbindConfig::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/winbind/config/'.$this->id;
    }
}
