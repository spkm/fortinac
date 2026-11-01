<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns if the GUI is currently configured to display any experimental or early development features: GET /system/debug/gui/experiments.
 */
class GetDebugGuiExperimentsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/system/debug/gui/experiments';
    }
}
