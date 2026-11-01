<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Data\System\DebugPluginStatus;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the debug status for all plugins: GET /system/debug/plugin-status.
 */
class GetDebugPluginStatusRequest extends ItemRequest
{
    protected ?string $dto = DebugPluginStatus::class;

    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin-status';
    }
}
