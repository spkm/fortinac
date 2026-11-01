<?php

namespace spkm\FortiNac\Requests\System\Debug;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the current performance statistics for the supplied plugin: GET /system/debug/plugin-performance.
 *
 * Parameters: pluginName.
 */
class GetDebugPluginPerformanceRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: pluginName
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/debug/plugin-performance';
    }
}
